<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Forum;
use App\Models\Comment;
use App\Models\CommentLike;
class SingleComment extends Component
{
   public  Comment $t;
   protected $listeners = ['commentAdded' => 'emitUp1','refreshComponent' => '$refresh'];
  
   public function render()
    {
       
       return view('livewire.single-comment');
       
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
            $this->emitSelf('refreshComponent');
        }
   public function emitUp1(){
       $this->emitUp('refreshComponent');
   }
}
