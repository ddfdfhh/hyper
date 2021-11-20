<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Helper;
use Validator;

use App\Models\Contact;

class HomeController extends Controller{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    /*public function __construct()
    {
        $this->middleware('auth');
    }*/

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(){
        return view('front.index');
    }
    
    public function userregister(){
        return view('auth.register');
    }
    
    //aboutus
    public function aboutus(){
        return view('front.pages.aboutus');
    }
    
    //team
    public function team(){
        return view('front.pages.team');
    }
    
    
    //contact us
    public function contactus(Request $request){
        if($request->input('submitcontact') == 'Submit'){
            $validator = Validator::make($request->all(), [
                'name' => 'required|string',
                'email' => 'required|string|email',
                'phone' => 'required|regex:/[0-9]{11}/',
                'message' => 'required|string|max:480',
            ]);
            if ($validator->fails()) {//dd($validator);
                    return redirect()->back()->withErrors($validator)->withInput();
            }else{
                $create = new Contact();
                $create->name = $request->input('name');
                $create->email = $request->input('email');
                $create->phone = $request->input('phone');
                $create->message = $request->input('message');
                $create->save();
                
                Session::flash('successmessage', "Your query send successfully our customer representative will contact to you soon.");
                return redirect()->back();
            }
        }
        return view('front.pages.contactus');
    }
    
    //services
    public function services(){
        return view('front.pages.services');
    }
    
    //partnerships
    public function partnerships(){
        return view('front.pages.partnerships');
    }
}
