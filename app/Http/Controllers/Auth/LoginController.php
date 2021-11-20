<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Auth;
use Validator;
use Session;
use Helper;
use App\Models\Point;
use App\Models\User;
use App\Models\Presale;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
   // protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    
    protected function redirectTo(){
       $t=Session::get('saleSession');
      // dd($t['presale_amount']);
        if (auth()->user()->user_type == 2) {
            if(Session::has('saleSession')){
                $eth = Helper::instance()->convertUsdToEthereum();
                $tokenValue = Helper::instance()->general_settings('hymeteor_token')->hymeteor_token;
                //dd(Session::get('saleSession')['presale_amount']);
                $create = new Presale();
                $create->user_id = Auth::user()->id;
                $create->amount = Session::get('saleSession')['presale_amount'];
                $create->ethereum = ($eth->ETH * Session::get('saleSession')['presale_amount']);
                $create->hyper_token = (Session::get('saleSession')['presale_amount'] / $tokenValue);
                $create->wallet_address = Session::get('saleSession')['yourwallet_address'];
                $create->hash_number = Session::get('saleSession')['hash_number'];
                $create->approved = 0;
                $create->published = 0;
                $create->save();
                
                Session::flash('successmessage', "Your request has been sent successfully, you will get update once your request has been approved.");
            }
            $point = Point::firstOrCreate(['points' => 50,'user_id'=>auth()->id()]);
            if(!empty(Session::get('saleSession')))
            {
                $t=Session::get('saleSession');
                 return route('paypal',['amount'=>$t['presale_amount']]);
            }
            else
              return '/user/dashboard';
        }elseif (auth()->user()->user_type == 1) {
            return '/admin/dashboard';
        }
        else return '/';
    }
    
     // logout from account
    public function logout(Request $request){
        Session::forget('saleSession');
        Auth::logout();
	    return redirect('/');
    }
    
    
    //adminlogin
    public function adminlogin(Request $request){
        //'register_name'		=> 'required|string|max:120|regex:/^[a-zA-Z]+$/u',
	$validator = Validator::make($request->all(), [
            'email'	=> 'required|max:120|email',
            'password'=> 'required|min:6',
	]);
			
	if ($validator->fails()) {//dd($validator);
            return redirect()->back()->withErrors($validator)->withInput();
        }else {
            $find = User::where('email', $request->input('email'))->first();
            if($find  && $find->user_type != 1){
                Session::flash('errorsmessage', "You has not valid user, Please contact our service provider.");
                return redirect()->back()->withInput();
            }elseif($find && $find->published != 1){
                Session::flash('errorsmessage', "Your account has not active, Please contact your service provider.");
                return redirect()->back()->withInput();
            }else{
                $credentials = $request->only('email', 'password');
                if (Auth::attempt($credentials)) {
                    // Authentication passed...
                    return redirect()->route('admin.dashboard');
                }else{
                    Session::flash('errorsmessage', "Your credentials does not matched.");
                    return redirect()->back()->withInput();
                }
            }
	}
    }
    
}
