<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Forum;
use App\Models\Comment;
// use App\Models\Reply;
class ForumFront extends Component
{
   public  $single_forum_id;
   public Forum $from;
   public  $comment_txt,$selected_forum,$showP=false,$page_title='Forum Topics';
   protected $listeners = ['refreshComponent' => '$refresh','commentAdded'=>'$refresh'];
  
   public function mount()
    {
    //  dd($this->single_forum_id);
        if($this->single_forum_id)
        { 
           
            $this->forum=Forum::find($this->single_forum_id);
            $this->page_title=$this->forum->title;
        }
    }
    
    public function render()
    {
        if(!$this->single_forum_id)
         { 
             $forums=Forum::with(['comments.user','comments.replies','comments.likes'])
                            ->withCount('comments')
                             ->whereStatus('Active')->latest()->get();
           //  dd($forums->toArray());
             return view('livewire.forum-front',compact('forums'));
         }
         else{
            $forums[0]=$this->forum;
            return view('livewire.single-forum',compact('forums'));
         }
        
    }
   
    public function resetFields(){
        $this->comment_txt='';
       
    }
   
        
        public function likeComment($id){
             Comment::where('id',$id)->increment('like_count',1);
             $this->emit('refreshComponent');
        }
        public function likeForum($id){
            Forum::where('id',$id)->increment('like_count',1);
             $this->emit('refreshComponent');
          }
}
