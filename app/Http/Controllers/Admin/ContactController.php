<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Helper;
use Session;
use Validator;

use App\Models\Contact;

class ContactController extends Controller{
    //index
    public function index(Request $request){
        $list = Contact::orderBy('id', 'desc')->simplePaginate(20);
        return view('backend.contact.index', compact('list'));
    }
    
    
    //destroy
    public function destroy(Request $request, $id){
        if(Contact::where('id', $id)->delete()){
            return back()->with('errormessage', 'Record deleted successfully');
        }else return back()->with('errormessage', 'Something went wrong.');
    }
    
    //update
    public function update(Request $request, $id){
        $validator = Validator::make($request->all(), [
            'published' => 'required|numeric',
        ]);
        if ($validator->fails()) {//dd($validator);
                return redirect()->back()->withErrors($validator)->withInput();
        }else{
            $update = Contact::find($id);
            $update->published = $request->input('published');
            $update->save();
            Session::flash('successmessage', "Request closed Successfully");
            return redirect()->back();
        }
    }
    
    //show
    public function show(request $request, $id){
        $detail = Contact::find($id);
        return view('backend.contact.show', compact('detail'));
    }
}
