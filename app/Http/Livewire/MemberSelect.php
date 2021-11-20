<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\MemberSelectModel;
use App\Models\Follower;
class MemberSelect extends Component
{
    public  $users,$selected=[];
    public function mount(){
        $this->users=Follower::with(['info'=>function($query){
                                  $query->select('id','name');
                                  }])->where('following_id',auth()->id())->get();
       // dd($this->users->toArray());
    array_push($this->selected,$this->users->toArray()[0]['id']);
    
    }
    public function render()
    {
       // dd($this->users);
       return view('livewire.member-select');
    }
    public function setSelected(){
        MemberSelectModel::where('user_id',auth()->id())->delete();
        $data=[];
         foreach($this->selected as $r){
                $data[]=[
                    'user_id'=>auth()->id(),'chat_to'=>$r
                ];
         }
           MemberSelectModel::insert($data);
          return redirect(route('user.messages'));
           
    }
}
