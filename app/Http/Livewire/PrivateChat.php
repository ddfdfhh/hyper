<?php
namespace App\Http\Livewire;
use Livewire\Component;
use App\Models\PrivateConversation;
use Livewire\WithFileUploads;
use App\Models\User;
use App\Models\Follower;
use App\Models\MemberSelectModel;
class PrivateChat extends Component
{
    use WithFileUploads;
    public  $chatting_to_id,
        $chatting_to_user,$search,
        $users,$allowedUsers,
        $me,$video,
        $message_txt,
        $file,
        $conversation_list=[],$file_list=[],
        $channel;
    public $listeners = ["refresh" => '$refresh'];
    public function mount()
    {
       
        $this->conversation_list = [];
        $this->me = auth()->user()->id;
        $this->MyLastChatInfo($this->me);
        $this->getMembersList();
    //  dd($this->users);
        if (empty($this->chatting_to_id)) {
            $this->setDefaultChattingToId();
        }
       // $this->setList();
        $this->dispatchBrowserEvent("scroll");
       
        
    }
    public function updating($key,$val){
       // dd($key);
        if($key=='search')
        {
               $ar=$this->getPrivateFollowers();
               $this->users=User::UnMuted()->whereIn('id',$ar)->where('name','like','%'.$val.'%')->get()->toArray();
               
           }
        }
    
    public function doSearch(){
        if($this->search)
        {
             $ar=$this->getPrivateFollowers();
            $this->users=User::UnMuted()->whereIn('id',$ar)->where('name','like','%'.$this->search.'%')->get()->toArray();
        
        }
    
    }
    public function markAllRead(){
      
        PrivateConversation::where("to_id", auth()->id())->where('is_read','No')
            ->update(['is_read'=>'Yes']);
            
    }
    public function setDefaultChattingToId()
    {
        if(count($this->users)>0){
            $first = $this->users->toArray()[0];
         
            $this->chatting_to_id = $first["id"];
            $this->chatting_to_user=User::find($first["id"]);
            $this->fetchLatestChatWith($this->chatting_to_id);
        }
        
    }
    public function getPrivateFollowers(){
         $q=PrivateConversation::where('from_id',auth()->id())->orWhere('to_id',auth()->id())->get(['to_id','from_id']);
         $ar=[];
         foreach($q as $r){
             $i=$r->from_id;
             $y=$r->to_id;
             if($i!=auth()->id())
               array_push($ar,$i);
             if($y!=auth()->id())
               array_push($ar,$y);
         }
        // dd($ar);
         return $ar;
    }
    public function getMembersList()
    {
      
         $ar=$this->getPrivateFollowers();
        $this->users=User::UnMuted()->whereIn('id',$ar)->get();
    }
    public function setChattingUser($uid)
    {
       //dd($uid);
        $this->chatting_to_id = $uid;
        $this->chatting_to_user = User::find($uid);
       $this->fetchLatestChatWith($uid);
       
    }
    

    public function render()
    {
       
        $this->markAllRead();
        $this->dispatchBrowserEvent("scroll");
        return view("livewire.private_chat");
    }
    public function refetch()
    {
      //  dd('csds');
        $with=$this->chatting_to_id;
        $room1 = "room-" . $with . "-" . $this->me;
        $room2 = "room-" . $this->me . "-" . $with;
        $this->chatting_to_id = $with;

        $this->chatting_to_user = User::find($with);

        $this->conversation_list = PrivateConversation::with("user")
            ->where("room", $room1)
            ->orWhere("room", $room2)->where("status", 1)
            ->get()
            ->ToArray();
            //$this->emitSelf('refresh');
    }

    public function postMessage()
    {
      
        $conv = new PrivateConversation;
        $conv->from_id = $this->me;
        $conv->to_id = $this->chatting_to_id;
        $conv->message = $this->message_txt;
        $conv->created_at = date("Y-m-d H:i:s");
        if($this->file){
             $path= $this->file->store('public/chat');
             $conv->file=basename($path);
        }
       
        $conv->room= "room-" . $this->me . "-" . $this->chatting_to_id;

        array_push($this->conversation_list,$conv->toArray());
        if($this->file)
            array_push($this->file_list,$conv->file);
        $this->dispatchBrowserEvent("scroll");
       
      
        $this->message_txt = "";
        $conv->save();
       
        if($this->file)
          $this->dispatchBrowserEvent("hide");
       $this->file=null; 
    }
    public function fetchLatestChatWith($with)
    {
        $room1 = "room-" . $this->me . "-" . $with;
        $room2 = "room-" . $with . "-" . $this->me;
        $this->conversation_list = PrivateConversation::with("user")
            ->whereIn("room", [$room1, $room2])->where("status",1)
            ->get()
            ->toArray();
     if($this->conversation_list)
        { 
            foreach($this->conversation_list as $r){
                if($r['file'])
                array_push($this->file_list,$r['file']);
                }
         } 
         else
         $this->file_list=[];
    }
    public function MyLastChatInfo($with)
    {
        $last_chat = PrivateConversation::with("user")
            ->where("from_id", $with)
            ->orWhere("to_id", $with)->where("status",1)
            ->latest()
            ->first();
        if ($last_chat) {
            $user1 = $last_chat->from_id;
            $user2 = $last_chat->to_id;
            $last_chatted_with = $user1 == $this->me ? $user2 : $user1;
            $this->chatting_to_user = User::find($last_chatted_with);
            $this->chatting_to_id = $last_chatted_with;
            $room1 = "room-" . $this->me . "-" . $last_chatted_with;
            $room2 = "room-" . $last_chatted_with . "-" . $this->me;
            $this->conversation_list = PrivateConversation::with("user")
                ->whereIn("room", [$room1, $room2])->where("status",1)
                ->get()
                ->toArray();
                foreach($this->conversation_list as $r){
                    if($r['file'])
                      array_push($this->file_list,$r['file']);
                }
        }
    }

}
