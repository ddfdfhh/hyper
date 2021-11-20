<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Forum;
use App\Models\Comment;
use App\Models\CommentLike;
use App\Models\LikeContentType;
class SingleForum extends Component
{
   public  $single_forum_id;
   public Forum $from;
   public  $offset=0,$limit=5,$comment_txt,$reply_txt,$selected_forum,$showP=false,$page_title='Forums';
   protected $listeners = ['refreshComponent' => '$refresh','commentAdded'=>'$refresh'];
   public function mount()
    {
        $this->forum=Forum::find($this->single_forum_id);
        $this->page_title=$this->forum->title;
        
    }
    public function render()
    {
            $forums[0]=$this->forum;
            $comments= Comment::with('user','replies','likes')->where(['forum_id'=>$this->single_forum_id,'parent_id'=>0])->get();
         // dd($comments->toArray());
           return view('livewire.single-forum',compact('forums','comments'));
         
    }
  
    public function resetFields(){
        $this->comment_txt='';
        $this->reply_txt='';
        $this->emit('refreshComponent');
    }
    
        public function likeComment($id){
            if(!CommentLike::where(['user_id'=>auth()->id(),'comment_id'=>$id])->exists())
            {
             Comment::where('id',$id)->increment('like_count',1);
             CommentLike::create(['user_id'=>auth()->id(),'comment_id'=>$id]);
            }
            else
            {
                Comment::where('id',$id)->decrement('like_count',1);
                CommentLike::where(['user_id'=>auth()->id(),'comment_id'=>$id])->delete();

            }

             $this->emit('refreshComponent');
            }
        public function likeForum($id){
            if(!LikeContentType::where(['user_id'=>auth()->id(),'content_id'=>$id,'content_type'=>'Forum'])->exists())
            {
             Forum::where('id',$id)->increment('like_count',1);
             LikeContentType::create(['user_id'=>auth()->id(),'content_id'=>$id,'content_type'=>'Forum']);
            }
            else
            {
                Forum::where('id',$id)->decrement('like_count',1);
                LikeContentType::where(['user_id'=>auth()->id(),'content_id'=>$id,'content_type'=>'Forum'])->delete();
 
            }
             $this->emit('refreshComponent');
            }
        public function likeReply($id){
            if(!CommentLike::where(['user_id'=>auth()->id(),'comment_id'=>$id])->exists())
            {
             Comment::where('id',$id)->increment('like_count',1);
             CommentLike::create(['user_id'=>auth()->id(),'comment_id'=>$id]);
            }
            else
            {
                Comment::where('id',$id)->decrement('like_count',1);
                CommentLike::where(['user_id'=>auth()->id(),'comment_id'=>$id])->delete();

            }
             $this->emit('refreshComponent');
            }
}
