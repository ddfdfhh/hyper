<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\User;
use Mail;
class HelpCenter extends Component
{
    use WithFileUploads;
   public $name,$email,$phoneno,$query,$file;
  protected $rules = [
        'query' => 'required|min:6|max:500',
        'email' => 'required|email|min:5',
    ];
    public function render()
    {
        return view("livewire.help_center");
    }
    public function sendmail()
    {
        $this->validate();
        $path='';
        //dd($this->file);
        if($this->file){
             $path= $this->file->store('public/help_center');
          $path=public_path('storage/help_center/'.basename($path));
        }
        
        $data["email"] = $this->email;
        $data["name"] = $this->name;
    
        $data["query"] = $this->query;
 
      
        Mail::send('emails.mail', $data, function($message)use($data, $path) {
            $message->to($data["email"], $data["name"])->from('info@hypermeteor.co.uk','sdvsd')
                    ->subject($data["query"]);
        if($path)
            $message->attach($path);
            
            
        });
        $this->name=''; $this->email=''; $this->query=''; $this->file='';
          session()->flash('message_comp','Thanks for querying.soon it will be resolved');
    }
}
