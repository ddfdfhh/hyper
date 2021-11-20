<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\Models\User;

class Bio extends Component
{
   public $bio='';
    public function mount()
    {
        $t = User::find(auth()->id());
        $this->bio=$t->bio;
        
    }
    public function render()
    {
        return view("livewire.bio");
    }
    public function save()
    {
       $me = User::find(auth()->id());
        $me->bio = $this->bio;
        $me->save();
       $this->dispatchBrowserEvent("bio-saved");
    }
}
