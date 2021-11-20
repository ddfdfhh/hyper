<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
use Validator;
use Auth;

use App\Models\Presale;
use App\Models\User;

class TokenRequestController extends Controller{
    //index
    public function index(Request $request){
        $list = Presale::orderBy('id', 'DESC')->simplePaginate(20);
        return view('backend.token.index', compact('list'));
    }
    
    //show
    public function edit(Request $request, $id){
        $detail = Presale::find($id);
        return view('backend.token.edit', compact('detail'));
    }
    
    //update
    public function update(Request $request, $id){
        $validator = Validator::make($request->all(), [
            'published' => 'required|numeric',
        ]);
        if ($validator->fails()) {//dd($validator);
                return redirect()->back()->withErrors($validator)->withInput();
        }else{
            $update = Presale::find($id);
            $update->published = $request->input('published');
            $update->save();
            
            //check and get user hyper_token
            $user = User::find($update->user_id);
            $hypertoken = $user->hyper_token + $update->hyper_token;
            User::where('id', $user->id)->update(['hyper_token' => $hypertoken]);
            
            Session::flash('successmessage', "Token approved Successfully");
            return redirect()->back();
        }
    }
    
    //destroy
    public function destroy(Request $request, $id){
        if(Presale::where('id', $id)->delete()){
            return back()->with('errormessage', 'Record deleted successfully');
        }else return back()->with('errormessage', 'Something went wrong.');
    }
    
}
