<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Session;
use Helper;
use Auth;

use App\Models\User;
use App\Models\HyperMeterCode;
use App\Models\Presale;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }
    
    
    //userregister
    public function userregister(Request $request){
        $customMessages = [
	'name.required'    =>	'The username field is required.',
	'name.min'         =>	'The username must be minimum 3 characters.',
	'name.max'         =>	'The username must be maximum 3 characters.',
	'name.string'      =>	'The username must be string field is required.',
        'name.without_spaces'      =>	'The username must be without space.',
        'email.required'    =>	'The email field is required.',
        'email.unique'    =>	'The email has already been taken.',
	'email.min'         =>	'The email must be minimum 8 characters.',
	'email.max'         =>	'The email must be maximum 120 characters.',
	'email.email'      =>	'The email must be a valid email.',
	'password.required' =>	'The password field is required.',
        'password.min' =>	'The password must be minimum 6 characters.',
	'password.max'=>	'The password must be maximum 120 characters.',
        'password.string'=>	'The password must be a valid string',
        'cpassword.required' =>	'The confirm password field is required.',
        'cpassword.min' =>	'The confirm password must be minimum 6 characters.',
	'cpassword.same'=>	'The confirm password and password must be same',
        'dob.required'    =>	'The date of birth field is required.',
	'dob.date_format'      =>	'The date of birth must be mm/dd/yyyy format.',
    'watsapp.regex'         =>	'The whatsapp must be minimum 11 characters.',
	'twitter_link.max'         =>	'The twiiter link must be maximum 3 characters.',
        ];
        Validator::extend('without_spaces', function($attr, $value){
            return preg_match('/^\S*$/u', $value);
        });
        
        $validator = Validator::make($request->all(), [
            'name' => 'required|min:3|max:120|string|without_spaces',
            'dob' => 'required|date_format:Y-m-d',
            'watsapp' => 'nullable|regex:/[0-9]{11}/',
            'twitter_link' => 'nullable|max:120|string',
            'email' => 'required|min:8|max:120|email|unique:users,email',
            'password' => 'required|min:6|max:120|string',
            'cpassword' => 'required|min:6|same:password',
	], $customMessages);
        if ($validator->fails()) {//dd($validator);
                return redirect()->back()->withErrors($validator)->withInput();
        }else{
            $user = new User();
            $user->name   = $request->input('name');
            $user->email  = $request->input('email');
            $user->dob   = $request->input('dob');
            $user->watsapp   = $request->input('watsapp');
            $user->twitter_link   = $request->input('twitter_link');
            $user->password   = Hash::make($request->post('password'));
            $user->register_type   = 1;
            $user->hyper_code   = NULL;
            $user->published   = 1;
            $user->user_type   = 2;
            $user->save();
            
            $credentials = $request->only('email', 'password');
            if (Auth::attempt($credentials)) {
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
                Session::flash('salemessage', "Your request has been sent successfully, you will get update once your request has been approved.");
            }
                // Authentication passed...
                Session::flash('successmessage', "Welcome ".ucwords($request->input('name')).", Your account has created successfully.");
                return redirect()->route('user.dashboard');
            }else{
                Session::flash('errorsmessage', "Your credentials does not matched.");
                return redirect()->back()->withInput();
            }
           /* $data = array(
                'name'      =>  $name,
		'message'   =>  'Account Creation',
		'username'  =>  $request->input('email'),
            );
            $emailto = $request->input('register_email');
            $emailFrom = \Config::get('mail.from.address');
            $emailFromname = \Config::get('mail.from.name');
            $emailCC = \Config::get('mail.cc');
            
            $message =   'Account Creation';          
            $res =  \Mail::send('frontend.emails.account_welcome',compact('data'), function ($message) use ($emailto,$emailFrom,$emailFromname,$emailCC) {
                $message->from($emailFrom, $emailFromname);
                $message->to($emailto);
                if($emailCC)$message->cc($emailCC);
                $message->subject('Account Creation');
            });*/
            //end semd mail
            return redirect()->back()->with('successmessage','Your account has created successfully, Please login and continue.');
        }
    }
    
    
    //userregister
    public function tokenregister(Request $request){
        $customMessages = [
	'tokenform_name.required'    =>	'The username field is required.',
	'tokenform_name.min'         =>	'The username must be minimum 3 characters.',
	'tokenform_name.max'         =>	'The username must be maximum 3 characters.',
	'tokenform_name.string'      =>	'The username must be string field is required.',
        'tokenform_name.without_spaces'      =>	'The username must be without space.',
        'email.required'    =>	'The email field is required.',
        'email.unique'    =>	'The email has already been taken.',
	'email.min'         =>	'The email must be minimum 8 characters.',
	'email.max'         =>	'The email must be maximum 120 characters.',
	'email.email'      =>	'The email must be a valid email.',
	'password.required' =>	'The password field is required.',
        'password.min' =>	'The password must be minimum 6 characters.',
	'password.max'=>	'The password must be maximum 120 characters.',
        'password.string'=>	'The password must be a valid string',
        'tokenform_cpassword.required' =>	'The confirm password field is required.',
        'tokenform_cpassword.min' =>	'The confirm password must be minimum 6 characters.',
	'tokenform_cpassword.same'=>	'The confirm password and password must be same',
        'tokenform_walletaddress.required'=>    'The hymeteor wallet address field is required.',
        ];
        
        Validator::extend('without_spaces', function($attr, $value){
            return preg_match('/^\S*$/u', $value);
        });
        
        $validator = Validator::make($request->all(), [
            'tokenform_name' => 'required|min:3|max:120|string|without_spaces',
            'email' => 'required|min:8|max:120|email|unique:users,email',
            'tokenform_walletaddress'=> 'required',
            'password' => 'required|min:6|max:120|string',
            'tokenform_cpassword' => 'required|min:6|same:password',
	], $customMessages);
        if ($validator->fails()) {
            $m = null;
            foreach ($validator->messages()->getMessages() as $field_name => $messages){
                $m .= $messages[0].'<br>'; // messages are retrieved (publicly)
            }
            echo $m;
            //dd($validator->messages);
            //return redirect()->back()->withErrors($validator)->withInput();
        }else{
            //check hyper code error from database 
            $count = HyperMeterCode::where('hyper_address', $request->input('tokenform_walletaddress'))->count();
            if($count){
                $check = HyperMeterCode::where('hyper_address', $request->input('tokenform_walletaddress'))->first();
                if($check->status == 0){
                    $user = new User();
                    $user->name   = $request->input('tokenform_name');
                    $user->email  = $request->input('email');
                    $user->password   = Hash::make($request->input('password'));
                    $user->hyper_code   = $request->input('tokenform_walletaddress');
                    $user->published   = 1;
                    $user->user_type   = 2;
                    $user->register_type   = 2;
                    $user->hypercode_verified   = 1;
                    $user->save();
                    HyperMeterCode::where('hyper_address', $request->input('tokenform_walletaddress'))->update(['status' => 1]);
                    $credentials = $request->only('email', 'password');
                    Auth::attempt($credentials);
                    $request->session()->regenerate();
                    $message = 1;//'Your hymeteor wallet address has been verified and registration has successfully completed';
                    
                }else $message = 'You have already registered with this wallet address, Please use another.';
                
            }else{
                $user = new User();
                $user->name   = $request->input('tokenform_name');
                $user->email  = $request->input('email');
                $user->password   = Hash::make($request->input('password'));
                $user->hyper_code   = $request->input('tokenform_walletaddress');
                $user->published   = 1;
                $user->user_type   = 2;
                $user->register_type   = 2;
                $user->hypercode_verified   = 0;
                $user->save();
                $credentials = $request->only('email', 'password');
                $authSuccess = Auth::attempt($credentials);
                if($authSuccess) $request->session()->regenerate();
                $message = 2;
                //$message = 'Registration has successfully completed but your hymeteor wallet address is not matched, Our customer representative will coordinate soon.';
            } 
            
            echo $message;
            
            /* $data = array(
                'name'      =>  $name,
		'message'   =>  'Account Creation',
		'username'  =>  $request->input('email'),
            );
            $emailto = $request->input('register_email');
            $emailFrom = \Config::get('mail.from.address');
            $emailFromname = \Config::get('mail.from.name');
            $emailCC = \Config::get('mail.cc');
            
            $message =   'Account Creation';          
            $res =  \Mail::send('frontend.emails.account_welcome',compact('data'), function ($message) use ($emailto,$emailFrom,$emailFromname,$emailCC) {
                $message->from($emailFrom, $emailFromname);
                $message->to($emailto);
                if($emailCC)$message->cc($emailCC);
                $message->subject('Account Creation');
            });*/
            //end semd mail
        }
    }
    
    
}
