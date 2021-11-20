<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
use Auth;
use Validator;

use App\Models\User;
use App\Models\Message;
use App\Models\Forum;
use App\Models\Follower;
use App\Models\MemberSelectModel;
use App\Models\Post;
use App\Models\Hyperzone;
use App\Events\NewMessageNotification;
use App\Models\PrivateConversation;
use App\Models\News;
class ProfileController extends Controller{
    //update profile
    function profile(Request $request){
          
        $customMessages = [
        'hyper_code.required'=>    'The hymeteor wallet address field is required.',
        'hyper_code.string'=>    'The hymeteor wallet address must be a string.',
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
	'watsapp.regex'         =>	'The watsapp must be minimum 11 characters.',
	'twitter_link.max'         =>	'The twiiter link must be maximum 3 characters.',
        ];
        $validator = Validator::make($request->all(), [
            'hyper_code' => 'required|string',
            'email' => 'required|min:8|max:120|email|unique:users,email,'.Auth::user()->id,
            'watsapp'=> 'nullable|regex:/[0-9]{11}/',
            'twitter_link' => 'nullable|min:6|max:120|string',
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
            $user = User::find(Auth::user()->id);
            $user->hyper_code = $request->input('hyper_code');
            $user->email = $request->input('email');
            $user->watsapp = $request->input('watsapp');
            $user->twitter_link = $request->input('twitter_link');
            $user->update();
            echo 1;
        }
    }
    
    
    //profilePhoto
    public function profilePhoto(Request $request){
        $validator = Validator::make($request->all(), [
            'file' => 'required|mimes:png,jpeg|max:8192',
        ]);
        if ($validator->fails()) {
            $m = null;
            foreach ($validator->messages()->getMessages() as $field_name => $messages){
                $m .= $messages[0].'<br>'; // messages are retrieved (publicly)
            }
            echo '<div class="alert alert-danger">'.$m.'</div>';
        }else{
            if($request->hasFile('file')){
                $files = $request->file('file');
		$destinationPath = public_path('frontend/uploads/');
		$imgName = rand(1000,9999).'_'.str_replace(' ', '-', strtolower(trim($files->getClientOriginalName())));
		$files->move($destinationPath, $imgName);
                
                $create = User::find(Auth::user()->id);
                $create->photo   = 'frontend/uploads/'.$imgName;
                $create->save();
                $imgul = asset('/frontend/uploads/'.$imgName);
                
                echo '<img src="'.$imgul.'" width="100" height="100">';
            }
        }
            
    }
    public function forums(){
     return view('front.user.forum');
    }
     public function collaborations(){
     return view('front.user.collaborations');
    }
    public function forum($id=null){
        $forum=Forum::find($id);
        return view('front.user.forum',['single_forum_id'=>$id,'forum1'=>$forum]);
       }
       public function help_center(){
      
        return view('front.user.help_center');
       }
    public function userFilter(Request $r){
        $term=$r->query('term');
      //  $t=User::where('name','like','%'.$term.'%')->where('id','!=',1)->where('status','!=','Muted')->get(['id','name AS text']);
      \DB::enableQueryLog();
        $t=Follower::with(['info'=>function($q){
            $q->select('id','name');
        }])->whereHas('info',function($query) use ($term){
                                  $query->select('id','name AS text')->where('name','like','%'.$term.'%')->where('status','!=','Muted')->where('id','!=',auth()->id())->where('id','!=',1);
                                  })->where('following_id',auth()->id())->get();
       
      
      return  response()->json($t);
    }
       public function messages(){
           if(auth()->user()->status=='Muted')
           {
               return redirect()->back();
           }
          if(auth()->user()->plan=='Free')
          { 
             $count=MemberSelectModel::where('user_id',auth()->id())->count();
              $count1=Follower::where('following_id',auth()->id())->count();
            // dd($count1);
            if($count==0)
            {
                if($count1>0)
                    return view('front.user.select_members_chat');
                else{
                echo "<script>alert('sorry You have no followers to chat')</script>";
                return redirect(route('user.dashboard'));
                    
                }
            }
          }
        return view('front.user.chat');
       }
    //     public function private_message($chat_to){
    //       if(auth()->user()->status=='Muted')
    //       {
    //           return redirect()->back();
    //       }
         
    //       if($chat_to){
    //           $chat_to=base64_decode($chat_to);
    //          // dd($chat_to);
    //           return view('front.user.private_message',compact('chat_to'));
    //       }
    //       else
    //       return redirect()->back();
    //   }
        public function private_message(){
           // dd('hihi');
             PrivateConversation::where('from_id',auth()->id())->orWhere('to_id',auth()->id())->where('is_read','No')->update(['is_read'=>'Yes']);
             return view('front.user.private_message');
          
       }
    public function hyperzone(){
        //event(new NewMessageNotification("hii"));
          return view('front.user.hyperzone');
       }
       public function hyperzone_front(){
       
          return view('front.user.hyperzone_buttons');
       }
       public function hyperzone_single($id=null,$obj=null){
        $row=Hyperzone::find($id);
        return view('front.user.hyperzone-single',compact('row','obj'));
       }
      
       public function wallet(){
       return view('front.user.wallet');
       }
        public function hyper_tokens(){
       return view('front.user.hyper_token1');
       }
          public function hyper_article(){
       return view('front.user.hyper_article');
       }
        public function guide(){
       return view('front.user.guide');
       }
          public function referrals(){
       return view('front.user.referrals');
       }
       public function profileView($base64id=null){
          $chat_to=null;
         // dd($base64id);
        if(!empty($base64id))
           $chat_to=$base64id;
        $detail = User::orderby('id', 'DESC')->find(Auth::user()->id);
        
        return view('front.user.dashboard',compact('detail','chat_to'));
       }
       public function about(){
       
        
        return view('front.user.about');
       }
       public function airdrop(){
        
        return view('front.user.airdrop');
       }
       public function notifications(){
         $news = News::whereStatus('Active')->orderby('id', 'DESC')->get();
        return view('front.user.notifications',compact('news'));
       }
       public function setting(){
        
        return view('front.user.setting');
       }
     public function single_post($id){
        // dd($id);
          $post=Hyperzone::with('owner')->findOrFail($id);
          return view('front.user.single-post',compact('post'));
       }
}
