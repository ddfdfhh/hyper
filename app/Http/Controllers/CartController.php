<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Validator;
use Auth;
use Helper;
use App\Models\Presale;

class CartController extends Controller{
    //storecart
    public function storecart(Request $request){
            
        $customMessages = [
        'presale_amount.required'=>    'The amount field is required.',
        'presale_amount.numeric'=>    'The amount must be a numeric.',
        //'wallet_address.required'=>    'The wallet address field is required.',
        //'wallet_address.string'=>    'The wallet address must be a string.',
        // 'hash_number.required'=>    'The transaction hash field is required.',
        // 'hash_number.string'=>    'The transaction hash must be a string.',
        'yourwallet_address.required'=>    'The your receive ethereum wallet field is required.',
        'yourwallet_address.string'=>    'Theyour receive ethereum wallet hash must be a string.',
	];
        $validator = Validator::make($request->all(), [
            'presale_amount' => 'required|numeric',
            //'wallet_address' => 'required|string',
            // 'hash_number'   =>  'required|string',
           'yourwallet_address'    =>   'required|string',
        ], $customMessages);
        if ($validator->fails()) {
            $m = null;
            foreach ($validator->messages()->getMessages() as $field_name => $messages){
                $m .= $messages[0].'<br>'; // messages are retrieved (publicly)
            }
             echo json_encode(['error'=>$m]);
        }else{
            $request->session()->put('presaleamount', $request->input('presale_amount'));
            $eth = Helper::instance()->convertUsdToEthereum();
            $finalprice = $eth->ETH * $request->input('presale_amount');
            
            if($finalprice > 1)
            echo json_encode(['error'=>'Your entered amount must be less than 1 Ethereum.']);
            else if(Auth::user()){
                 $amt= $request->input('presale_amount');
                  $array = array( 'presale_amount' => $request->input('presale_amount'), 
                                'hash_number' => $request->input('hash_number'),
                                'yourwallet_address' => $request->input('yourwallet_address'));
                Session::forget('saleSession');
                Session::put('saleSession', $array);
                $red_url=route('paypal',['amount'=>$amt]);
                echo json_encode(['success'=> $red_url]);
             
            }else{
                $array = array( 'presale_amount' => $request->input('presale_amount'), 
                                'hash_number' => $request->input('hash_number'),
                                'yourwallet_address' => $request->input('yourwallet_address'));
                Session::forget('saleSession');
                Session::put('saleSession', $array);
                $red_url=route('login');
                echo json_encode(['success'=> $red_url]);
                
            } 
        }
    }
    
    
    //convert usd to ethereum
    
}
