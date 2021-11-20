<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Follower;
use App\Models\User;
class Follower1 extends Component
{
    protected $listeners = ['refreshComponent' => '$refresh'];
    public $followers=[],$users=[],$following=[],$followers_count,$following_count,$page_following=1,$page_followers=1,$limit_followers=5,$limit_following=10;
    public function mount(){
      
      
        
    }
    public function render()
    {
        
          $this->following=Follower::where('user_id',auth()->id())->get(['following_id'])->pluck('following_id')->toArray();
           $this->following_count=Follower::where('user_id',auth()->id())->count();
      
          $this->followers=Follower::with('info')->where('following_id',auth()->id())->limit($this->limit_followers)->get();
          $this->followers_count=Follower::where('following_id',auth()->id())->count();
           $this->users=User::withCount('followers')->where('status','Active')->where('id','!=',auth()->id())->where('id','!=',1)->limit($this->limit_following)->get();
       
        
          return view('livewire.followers');
     
    }
    public function follow($id){
          $t=Follower::where(['user_id'=>auth()->id(),'following_id'=>$id])->exists();
          if(!$t){
              Follower::insert(['user_id'=>auth()->id(),'following_id'=>$id]);
          }
        
    }
     public function unfollow($id){
          $t=Follower::where(['user_id'=>auth()->id(),'following_id'=>$id])->exists();
          if($t){
              Follower::where(['user_id'=>auth()->id(),'following_id'=>$id])->delete();
          }
        
    }
     public function block($id){
          $t=Follower::where(['following_id'=>auth()->id(),'user_id'=>$id])->first();
          if($t){
              $t->status='Blocked';$t->save();
          }
         // session()->flash('message-comp');
    }
       public function unblock($id){
          $t=Follower::where(['following_id'=>auth()->id(),'user_id'=>$id])->first();
          if($t){
              $t->status='Active';$t->save();
          }
         // session()->flash('message-comp');
    }
    public function loadMoreFollowing(){
       
        $this->page_following= $this->page_following+1;
        $this->limit_following=$this->page_following*10;
         $this->users=User::withCount('followers')->where('status','Active')->where('id','!=',auth()->id())->where('id','!=',1)->limit($this->limit_following)->get();
        
      
    }
     public function loadMoreFollowers(){
       
        $this->page_followers= $this->page_followers+1;
        $this->limit_followers=$this->page_followers*10;
         $this->followers=Follower::with('info')->where('following_id',auth()->id())->limit($this->limit_followers)->get();
         
      
    }
    
}