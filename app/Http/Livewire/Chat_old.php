<?php
namespace App\Http\Livewire;
use Livewire\Component;
use App\Models\Conversation;
use Livewire\WithFileUploads;
use App\Models\User;
use App\Models\MemberSelectModel;
use App\Events\NewMessageNotification;
use App\Events\JoinedChat;
class ChatOld extends Component
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
          
               $this->users=User::UnMuted()->where('name','like','%'.$val.'%')->get()->toArray();
               
           }
        }
    
    public function doSearch(){
        if($this->search)
        {
            $this->users=User::UnMuted()->where('name','like','%'.$this->search.'%')->get()->toArray();
        
        }
    
    }
    public function setDefaultChattingToId()
    {
        $first = $this->users->toArray()[0];
     
        $this->chatting_to_id = $first["id"];
        $this->chatting_to_user=User::find($first["id"]);
        $this->fetchLatestChatWith($this->chatting_to_id);
        
    }
    public function getMembersList()
    {
        $this->users = User::UnMuted()->where("id", "!=", auth()->id())->where("id", "!=",1)->limit(20)->get([
            "id",
            "name",
            "live_status",
        ]);
        if (auth()->user()->plan == "Free") {
            $count = MemberSelectModel::where("user_id", auth()->id())->count();
            if($count!=0){
                $this->allowedUsers = MemberSelectModel::where("user_id", auth()->id())->get()->pluck('chat_to')->toArray();
                $col=collect($this->users);
       
                $allowed_models=$col->filter(function($v){
                     return in_array($v->id,$this->allowedUsers);
                });
                $remaining_models=$col->reject(function($v){
                     return in_array($v['id'],$this->allowedUsers);
                });
               $this->users=$allowed_models->merge($remaining_models);
            }
            // else 
            //   return redirect(route('messages'));
        } 

            

        
    }
    public function setChattingUser($uid)
    {
       //dd($uid);
        $this->chatting_to_id = $uid;
        $this->chatting_to_user = User::find($uid);
       $this->fetchLatestChatWith($uid);
       
    }
    public function getListeners()
    {
        return [
            "echo-private:group,NewMessageNotification" => "notifyNewOrder"
           
        ];
    }
    public function notifyNewOrder($t)
    {
        $this->dispatchBrowserEvent("msg", [
            "to" => $t["to"],
            "from" => $t["from"],'message'=>$t['message']
        ]);
    }

    public function render()
    {
       
        //broadcast(new JoinedChat())->toOthers();
        $this->dispatchBrowserEvent("scroll");
        return view("livewire.chat");
    }
    public function refetch()
    {
      //  dd('csds');
        $with=$this->chatting_to_id;
        $room1 = "room-" . $with . "-" . $this->me;
        $room2 = "room-" . $this->me . "-" . $with;
        $this->chatting_to_id = $with;

        $this->chatting_to_user = User::find($with);

        $this->conversation_list = Conversation::with("user")
            ->where("room", $room1)
            ->orWhere("room", $room2)->where("status", 1)
            ->get()
            ->ToArray();
            //$this->emitSelf('refresh');
    }

    public function postMessage()
    {
      
        $conv = new Conversation;
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
       
        broadcast(
            new NewMessageNotification(
                $this->message_txt,
                $this->chatting_to_id,
                $this->me
            )
        )->toOthers();
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
        $this->conversation_list = Conversation::with("user")
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
        $last_chat = Conversation::with("user")
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
            $this->conversation_list = Conversation::with("user")
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
