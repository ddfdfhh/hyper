<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Session;
use App\Models\User;
use App\Models\Post;
use App\Helpers\Helper;
use App\Models\Follower;
use App\Models\News;
use App\Models\Hyperzone;
class DashboardController extends Controller{
    //index
    public function index(Request $request){
        
       $my_posts=Hpyerzone::with('owner','comments')->withCount('all_comments')->where('user_id',auth()->id())->latest()->get();
        $following_count1=Follower::where('user_id',auth()->id())->count();
        $followers_count1=Follower::where('following_id',auth()->id())->count();
         $news = News::whereStatus('Active')->orderby('id', 'DESC')->get();
        $detail = User::orderby('id', 'DESC')->find(Auth::user()->id);
        return view('front.user.index', compact('detail','my_posts','following_count1','followers_count1','news'));
    }
    public function profile(Request $request){
        $detail = User::orderby('id', 'DESC')->find(Auth::user()->id);
        return view('front.user.profile', compact('detail'));
    }
      public function search(Request $request){
          $term=$request->get('q');
          $posts=Post::with('owner','comments')->withCount('all_comments')->whereRaw("MATCH(details) AGAINST(?)",[$term])->latest()->get();
          return view('front.user.search', compact('posts','term'));
    }
}
