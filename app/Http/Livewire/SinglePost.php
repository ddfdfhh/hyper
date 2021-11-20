<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Hyperzone;
use App\Models\Comment;
use App\Models\CommentLike;
use App\Models\LikeContentType;
class SinglePost extends Component
{
   public  $post;
   
   public  $offset=0,$limit=5,$comment_txt,$reply_txt,$selected_forum,$showP=false,$page_title='Forums';
   protected $listeners = ['refreshComponent' => '$refresh','commentAdded'=>'$refresh'];
  
    public function render()
    {
           
            $comments= Comment::with('user','replies','likes')->where(['post_id'=>$this->post->id,'parent_id'=>0])->get();
       
           return view('livewire.single-post',compact('comments'));
         
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
        public function likePost($id){
           // dd($id);
            if(!LikeContentType::where(['user_id'=>auth()->id(),'content_id'=>$id,'content_type'=>'Post'])->exists())
            {
                Hyperzone::where('id',$id)->increment('like_count',1);
             LikeContentType::create(['user_id'=>auth()->id(),'content_id'=>$id,'content_type'=>'Post']);
            }
            else
            {
                Hyperzone::where('id',$id)->decrement('like_count',1);
                LikeContentType::where(['user_id'=>auth()->id(),'content_id'=>$id,'content_type'=>'Post'])->delete();
 
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
