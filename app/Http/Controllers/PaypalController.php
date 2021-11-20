<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Validator;
use URL;
use Session;
use Redirect;
use Input;
use Auth;
use PayPal\Rest\ApiContext;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Api\Amount;
use PayPal\Api\Details;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\RedirectUrls;
use PayPal\Api\ExecutePayment;
use PayPal\Api\PaymentExecution;
use PayPal\Api\Transaction;
use App\Models\Presale;
use Helper;
class PaypalController extends Controller
{
    private $_api_context;
    
    public function __construct()
    {
            
        $paypal_configuration = \Config::get('paypal');
        $this->_api_context = new ApiContext(new OAuthTokenCredential($paypal_configuration['client_id'], $paypal_configuration['secret']));
        $this->_api_context->setConfig($paypal_configuration['settings']);
    }
 public function redirecttologin($amount){
     //dd($amount);
     Session::put('paypal_amount',$amount);
     //dd( Session::get('paypal_amount'));
     return redirect(route('login'));
 }
    public function payWithPaypal()
    {
        return view('paywithpaypal');
    }

    public function postPaymentWithpaypal($amount1)
    {
       $amount1=number_format($amount1,2);
      
        $payer = new Payer();
        $payer->setPaymentMethod('paypal');

    	$item_1 = new Item();

        $item_1->setName('Product 1')
            ->setCurrency('USD')
            ->setQuantity(1)
            ->setPrice($amount1);

        $item_list = new ItemList();
        $item_list->setItems(array($item_1));
        $amount = new Amount();
        $amount->setCurrency('USD')
            ->setTotal($amount1);

        $transaction = new Transaction();
        $transaction->setAmount($amount)
            ->setItemList($item_list)
            ->setDescription('Enter Your transaction description');

        $redirect_urls = new RedirectUrls();
        $redirect_urls->setReturnUrl(URL::route('status'))
            ->setCancelUrl(URL::route('status'));

        $payment = new Payment();
        $payment->setIntent('Sale')
            ->setPayer($payer)
            ->setRedirectUrls($redirect_urls)
            ->setTransactions(array($transaction));            
        try {
            $payment->create($this->_api_context);
        } catch (\PayPal\Exception\PPConnectionException $ex) {
            if (\Config::get('app.debug')) {
                \Session::put('error','Connection timeout');
                return Redirect::route('payment-error');                
            } else {
                \Session::put('error','Some error occur, sorry for inconvenient');
                return Redirect::route('payment-error');                
            }
        }

        foreach($payment->getLinks() as $link) {
            if($link->getRel() == 'approval_url') {
                $redirect_url = $link->getHref();
                break;
            }
        }
        
        Session::put('paypal_payment_id', $payment->getId());

        if(isset($redirect_url)) {            
            return Redirect::away($redirect_url);
        }

        \Session::put('error','Unknown error occurred');
    	return Redirect::route('payment-error');
    }

    public function getPaymentStatus(Request $request)
    {        
        $payment_id = Session::get('paypal_payment_id');
    
        Session::forget('paypal_payment_id');
        if (empty($request->input('PayerID')) || empty($request->input('token'))) {
         \Session::put('error','Payment Failed');
            return Redirect::route('payment-error');
        }
        if(empty($payment_id)){
            \Session::put('error','Payment Failed.Retry Payment again');
            return Redirect::route('payment-error');
        }
        $payment = Payment::get($payment_id, $this->_api_context);        
        $execution = new PaymentExecution();
        $execution->setPayerId($request->input('PayerID'));        
        $result = $payment->execute($execution, $this->_api_context);
        
        if ($result->getState() == 'approved') {         
        //   dd(Session::get('paypal_amount'));
         return   $this->act(Session::get('paypal_amount'));
        }

        \Session::put('error','Payment failed !!');
			return Redirect::route('payment-error');
    }
    public function act($amount){
           if(!$amount)
           $amount=Session::get('saleSession')['presale_amount'];
            $eth = Helper::instance()->convertUsdToEthereum();
            $finalprice = $eth->ETH * $amount;
            
            if($finalprice > 1)
            {
               \Session::put('error','Your entered amount must be less than 1 Ethereum.');
             	return Redirect::route('payment-error');
            }
            else if(Auth::user()){
                $tokenValue = Helper::instance()->general_settings('hymeteor_token')->hymeteor_token;
                $create = new Presale();
                $create->user_id = Auth::user()->id;
                $create->amount = $amount;
                $create->ethereum = $finalprice;
                $create->hyper_token = ($amount / $tokenValue);
                $create->wallet_address =Session::get('saleSession')['yourwallet_address'];
                $create->hash_number = '';
                $create->approved = 0;
                $create->published = 0;
                $create->payment_mode = 'Paypal';
                $create->save();
               	return Redirect::route('payment-success');
            }
            else{
                \Session::put('error','please login');
             	return Redirect::route('payment-error');
            }
    }
}