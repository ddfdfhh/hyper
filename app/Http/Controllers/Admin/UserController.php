<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
use Auth;
use Validator;
use DB;

use App\Models\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        //$list = User::where('user_type', 2)->whereIn('register_type', [1,2])->where('published' ,'!=', 2)->orWhere('hypercode_verified',1)->orderby('id', 'DESC')->simplePaginate(20);
        //DB::enableQueryLog();
        $list = User::where('user_type', 2)->where('published' ,'!=', 2)->where(function($q){
            $q->where(function($qq){    $qq->where('register_type', 1)->Where('hypercode_verified',0);});
            $q->orWhere(function($qq){  $qq->where('register_type', 2)->Where('hypercode_verified',1);});
        })->orderby('id', 'DESC')->simplePaginate(20);
        //dd(DB::getQueryLog());
        return view('backend.users.index', compact('list'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id){
        $detail = User::find($id);
        return view('backend.users.show', compact('detail'));
    }
    
    //update status
    public function updatestatus(Request $request, $id){
        if(User::where('id', $id)->update(array('published' => $request->input('user_status')))){
            Session::flash('successmessage', "User updated successfully.");
            return redirect()->route('users.index');
        }else{
            Session::flash('successmessage', "There is some issue to update users.");
            return redirect()->route('users.index');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id){
        $detail = User::find($id);
        return view('backend.users.edit', compact('detail'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id){
        Validator::extend('without_spaces', function($attr, $value){
            return preg_match('/^\S*$/u', $value);
        });
        $validator = Validator::make($request->all(), [
            'username' => 'required|min:3|max:120|string|without_spaces',
            'email' => 'required|min:8|max:120|email|unique:users,email,'.$id,
            'dob' => 'nullable|date_format:Y-m-d',
            'watsapp' => 'nullable|regex:/[0-9]{11}/',
            'twitter_link' => 'nullable|max:120|string',
            'hyper_code' => 'required|max:120|string',
            'hyper_code_verified'   =>  'required|max:120|string',
            'user_status'   =>  'required|numeric',
        ]);
        if ($validator->fails()) {//dd($validator);
                return redirect()->back()->withErrors($validator)->withInput();
        }else{
            $update = User::find($id);
            $update->name = $request->input('username');
            $update->email = $request->input('email');
            $update->dob = $request->input('dob');
            $update->watsapp = $request->input('watsapp');
            $update->twitter_link = $request->input('twitter_link');
            $update->hyper_code = $request->input('hyper_code');
            $update->hypercode_verified = $request->input('hyper_code_verified');
            $update->published = $request->input('user_status');
            $update->update();
            return back()->with('successmessage', 'User details updated successfully');
        }
    }

    //exportUsersCsv
    public function exportUsersCsv(Request $request, $hypercode = NULL){
        $fileName = 'userdata.csv';
        if($hypercode == 1) $users = User::where('user_type', 2)->where('hypercode_verified', 1)->where('register_type', 2)->get();
        else if($hypercode == 0) $users = User::where('user_type', 2)->where('hypercode_verified', 0)->where('register_type', 2)->get();
        else $users = User::where('user_type', 2)->get();

        $headers = array(
            "Content-type"        => "text/csv",
            "Content-Disposition" => "attachment; filename=$fileName",
            "Pragma"              => "no-cache",
            "Cache-Control"       => "must-revalidate, post-check=0, pre-check=0",
            "Expires"             => "0"
        );

        $columns = array('Email', 'Watsapp Number', 'Hymeteor Wallet Address');

        $callback = function() use($users, $columns) {
            $file = fopen('php://output', 'w');
            fputcsv($file, $columns);

            foreach ($users as $task) {
                $row['Email']  = $task->email;
                $row['Watsapp Number']    = $task->watsapp;
                $row['Hymeteor Wallet Address']    = $task->hyper_code;
                
                fputcsv($file, array($row['Email'], $row['Watsapp Number'], $row['Hymeteor Wallet Address']));
            }

            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }
    
    
    //valid users list
    public function validUsers(Request $request){
        $list = User::where('user_type', 2)->where('hypercode_verified', 1)->where('register_type', 2)->where('published' ,'!=', 2)->orderBy('id', 'desc')->simplePaginate(20);
        return view('backend.users.validuser', compact('list'));
    }
    
    //invalid users list
    public function invalidUsers(Request $request){
        $list = User::where('user_type', 2)->where('hypercode_verified', 0)->where('register_type', 2)->where('published' ,'!=', 2)->orderBy('id', 'desc')->simplePaginate(20);
        return view('backend.users.invaliduser', compact('list'));
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){
        if(User::where('id', $id)->update(['published' => 2])){
            return back()->with('successmessage', 'Record deleted successfully');
        }else return back()->with('errormessage', 'Someting went wrong.');
    }
}
