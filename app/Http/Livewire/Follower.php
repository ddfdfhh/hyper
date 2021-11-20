<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Follower;
use App\Models\User;
class Follower1 extends Component
{
    
    public $followers=[],$users=[],$following=[];
    public function mount(){
      
    }
    public function render()
    {
          $this->following=Follower::where('user_id',auth()->id())->get();
         $this->users=User::withcCount('followers')->where('status','Active')->get();
        return view('livewire.followers');
     
    }
    public function follow($id){
          $t=Follower::where(['user_id'=>auth()->id(),'following_id'=>$id])->exists();
          if(!$t){
              Follower::insert(['user_id'=>auth()->id(),'following_id'=>$id]);
          }
         // session()->flash('message-comp');
    }
     public function unfollow($id){
          $t=Follower::where(['user_id'=>auth()->id(),'following_id'=>$id])->exists();
          if(!$t){
              Follower::where(['user_id'=>auth()->id(),'following_id'=>$id])->delete();
          }
         // session()->flash('message-comp');
    }
}