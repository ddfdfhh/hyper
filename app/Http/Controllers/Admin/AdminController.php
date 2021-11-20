<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
use Validator;
use Auth;
use Hash;

use App\Models\User;
use App\Models\Forum;
use App\Models\GeneralSetting;
use App\Models\Conversation;
use App\Models\Hyperzone;
use App\Models\News;
class AdminController extends Controller{
    //index
    public function index(Request $request){//dd('ji');
        $users = User::where('user_type', 2)->orderby('id', 'DESC')->simplePaginate(20);
        return view('backend.dashboard', compact('users'));
    }
        
        
    //admin login 
    public function login(Request $request){
        return view('backend.login');
    }
    
    //profile
    public function profile(Request $request){
        $details = User::findorfail(Auth::user()->id);
        return view('backend.profile', compact('details'));
    }
    
    
    //updateprofile
    public function updateprofile(Request $request){
        if($request->input('update') == 'Update'){
            $customMessages = [
                'oldpassword.required' 	=>	'The Old Password field is required.',
		'oldpassword.min' 		=>	'The Old Password must be minimum 6 digits.',
		'newpassword.min' 		=>	'The New Password must be minimum 6 digits.',
		'renewpassword.required' 	=>	'The Re-Type New Password must be minimum 6 digits.',
		'renewpassword.min' 	=>	'The Re-Type New Password must be minimum 6 digits.',
		'renewpassword.same' 	=>	'The Re-Type New Password and New Password must be same',
            ];
			
            $validator = Validator::make($request->all(), [
                'name' 	=> 'required|max:120|string',
		'email' 	=> 'required|min:10|max:120|email',
		'password' 	=> 'nullable|min:6|same:confirm_password',
            ]);

            if($validator->fails()){
                return redirect()->back()->withErrors($validator)->withInput();
            }else {
                $update = User::find(Auth::user()->id);
		$update->name = $request->input('name');
		$update->email	 = $request->input('email');
		if($request->input('password')){
                    $update->password = Hash::make($request->input('password'));
		}
		$update->update();
				
		Session::flash('successmessage', "Data Updated Successfully");
            }
		
	}else Session::flash('errormessage', "There has some issue to update details.");
            return redirect()->back();
    }
    
    
    //generalSettings
    public function generalSettings(Request $request){
        if($request->input('submit') == 'Update'){
            $validator = Validator::make($request->all(), [
                'logo'          => 'nullable|mimes:png,jpeg,jpg,PNG,JPEG,JPG|max:1024|dimensions:max_width=200,max_height=100',
                'fav_icon'      => 'nullable|mimes:png,jpeg,jpg,PNG,JPEG,JPG|max:1024|dimensions:max_width=50,max_height=50',
		'reddit_url'	=> 'required|string',
		'twitter_url'	=>	'required|string',
		'instagram_url'	=>	'required|string',
		'linkedin_url'	=>	'required|string',
                'youtube_url'	=>	'required|string',
                'discord_url'	=>	'required|string',
                'hyper_url'	=>	'required|string',
		'site_title'	=>	'required|string',
                'address'	=>	'required|string',
		'phone'         =>	'required|numeric',
		'email'         =>	'required|email',
                'hymeteor_token'=>  'required|numeric',
            ]);

            if($validator->fails()){
                return redirect()->back()->withErrors($validator)->withInput();
            }else {
                $update = GeneralSetting::find('1');
                if($request->hasFile('logo')){
                    $update->logo = $request->logo->store('uploads/logo');
		}
				
		if($request->hasFile('fav_icon')){
                    $update->favicon = $request->fav_icon->store('uploads/logo');
		}
                $update->reddit 	= $request->input('reddit_url');
                $update->twitter 	= $request->input('twitter_url');
		$update->linkedin 	= $request->input('linkedin_url');
		$update->instagram      = $request->input('instagram_url');
                $update->youtube 	= $request->input('youtube_url');
                $update->discord 	= $request->input('discord_url');
		$update->hyper          = $request->input('hyper_url');
		$update->site_title	= $request->input('site_title');
		$update->address	= $request->input('address');
                $update->phone          = $request->input('phone');
		$update->email          = $request->input('email');
                $update->hymeteor_token	= $request->input('hymeteor_token');
                $update->save();
                Session::flash('successmessage', "Data Updated Successfully");               
                return redirect()->back();
            }
        }
        $detail = GeneralSetting::orderBy('id', 'DESC')->first();
        return view('backend.generalsetting', compact('detail'));
    }
    
public function viewForum($id){
       $f=Forum::findOrFail($id);
        return view('backend.forum.view',compact('f'));
}
public function editForum($id){
       $f=Forum::findOrFail($id);
    return view('backend.forum.edit',compact('f'));
}
public function updateForum(Request $r,$id){
    $validatedDate = $r->validate(
        ['title' => ['required', 'string', 'max:255'],
         'details' => ['required'],
         'feature_image' => 'sometimes|nullable|image|max:2048',
        ],['details.required'=>'Description is required']);
     if ($r->has('feature_image'))
        {
          
            // if(file_exists(storage_path('app/public/forum/'.$r->file('old_feature_image'))))
            //     unlink(storage_path('app/public/forum/'.$r->input('old_feature_image')));
            $path = $r->file('feature_image')->store('public/forum');
            $validatedDate['featured_image']=basename($path);
       }
       unset($validatedDate['feature_image']);
       Forum::where('id',$id)->update($validatedDate);
       //$this->reset();
       session()->flash('message_comp','Forum successfully updated');
     return  redirect(route('admin.forum'));
}
public function viewNews($id){
       $f=News::findOrFail($id);
        return view('backend.news.view',compact('f'));
}
public function editNews($id){
       $f=News::findOrFail($id);
    return view('backend.news.edit',compact('f'));
}
public function updateNews(Request $r,$id){
    $validatedDate = $r->validate(
        ['title' => ['required', 'string', 'max:255'],
         'details' => ['required'],
         'feature_image' => 'sometimes|nullable|image|max:2048',
        ],['details.required'=>'Description is required']);
     if ($r->has('feature_image'))
        {
          
            // if(file_exists(storage_path('app/public/forum/'.$r->file('old_feature_image'))))
            //     unlink(storage_path('app/public/forum/'.$r->input('old_feature_image')));
            $path = $r->file('feature_image')->store('public/news');
            $validatedDate['featured_image']=basename($path);
       }
       unset($validatedDate['feature_image']);
       News::where('id',$id)->update($validatedDate);
       //$this->reset();
       session()->flash('message_comp','News successfully updated');
     return  redirect(route('admin.news'));
}
public function chats(){
    $chat_list=Conversation::with(['user','to_user'])->latest()->simplePaginate(10);
    return view('backend.chats',compact('chat_list'));
}

public function user_list(Request $r){
    $search=$r->query('term');
    $user_list=User::whereUserType('2');
    if($search)
       $user_list=$user_list->where('name','like','%'.$search.'%')->orWhere('email','like','%'.$search.'%');
    $user_list=$user_list->simplePaginate(10);
   
    $cur_moderator=User::where('user_type','3')->first();
   
    return view('backend.user_list',compact('user_list','cur_moderator'));
}
public function hyperzoneList(Request $r){
    $search=$r->query('term');
    $list=Hyperzone::simplePaginate(10);
    if($search)
       $list=$user_list->where('name','like','%'.$search.'%')->orWhere('email','like','%'.$search.'%')->simplePaginate(10);
    return view('backend.hyperzone_list',compact('list'));
}
public function chat_delete($id,$status){
    $conv=Conversation::findOrFail($id);
   
    $file=$conv->file;
   
    // if($file && file_exists(storage_path('app/public/chat/'.$file))){
    //  unlink(storage_path('app/public/chat/'.$file));
    // }
    $conv->status=$status ;$conv->save();
    return redirect()->back()->with('successmessage','Action completed   successfully');
}
public function assingModerator(Request $r){
    if($r->input('id'))
    {
        
        User::where('user_type','!=',1)->update(['user_type'=>2]);
        //\DB::enableQueryLog();
        User::where('id',$r->input('id'))->update(['user_type'=>3]);
        // dd( \DB::getQueryLog());
       
    }
    return redirect(route('admin.users1'))->with('successmessage','Moderator set  successfully');
}
public function muteUser(Request $r){
    if($r->input('id'))
    {
        
      $user= User::where('id',$r->input('id'))->first();
      if($user->status!='Muted')
       {
           $user->status='Muted';
           $user->save();
       }
      else 
        {
             $user->status='Active';
             $user->save();
        }
    }
    return redirect(route('admin.users1'))->with('successmessage','User muted  successfully');
}
public function hyperzoneUpdate(Request $r){
    if($r->input('id'))
    {
       Hyperzone::where('id',$r->input('id'))->update(['status'=>$r->status]);
    }
    return redirect(route('admin.hyperzones'))->with('successmessage','Action  successfull');
}
}
