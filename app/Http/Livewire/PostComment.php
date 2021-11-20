<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Forum;
use App\Models\Comment;
use App\Models\Reply;
class PostComment extends Component
{
   public  $parent_id,$forum_id,$post_id,$comment_for;
   public  $comment_txt;
   
    public function render()
    {
         return view('livewire.post-comment');
         
    }
  
    public function resetFields(){
        $this->comment_txt='';
        $this->emitUp('commentAdded');
    }
    public function postComment(){
    
        if(strlen(trim($this->comment_txt))>0)
            {  
                if($this->comment_for=='Forum')
                   $validatedData['forum_id']=$this->forum_id;
                else
                   $validatedData['post_id']=$this->post_id;

                $validatedData['comment_for']=$this->comment_for;
                $validatedData['text']=$this->comment_txt;
                $validatedData['parent_id']=$this->parent_id;
                $validatedData['user_id']=auth()->user()->id;
                Comment::create($validatedData);
                $this->resetFields();
        }
        }
     
}
