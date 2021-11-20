<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
class Profile extends Component
{
   public User $detail1;
   public $password,$password_confirmation;
   protected $rules = [
        'detail1.email' => 'required|email|min:6',
        'detail1.dob' => 'nullable|date',
        'password' => 'required|confirmed|min:6',
        'password_confirmation' => 'required|same:password|min:6',
        'detail1.hyper_code' => 'nullable',
    ];
    public function mount()
    {
       
        $this->detail1=User::find(auth()->id());
        
    }
    public function render()
    {
        return view("livewire.profile_update");
    }
    public function save()
    {
        if($this->password)
           $this->detail1->password=Hash::make($this->password);
       $this->detail1->save();
    }
}
