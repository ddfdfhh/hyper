<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Post;
use App\Models\Comment;
use App\Models\Point;
use App\Models\LikeContentType;
use Livewire\WithFileUploads;
use Image;
class PostCommentLivewire extends Component
{
    use WithFileUploads;
   public  $post_content,$list=null,$image,$video;
   public $listeners=['added'=>'$refresh','commentAdded'=>'$refresh'];
    public function render()
    {
        $this->list=Post::with('owner','comments')->withCount('all_comments')->latest()->get();
    
         return view('livewire.home-post-comment');
         
    }
  
    public function resetFields(){
        $this->post_content='';
        $this->image=null;
        $this->video=null;
        $this->emitSelf('added');
        session()->flash('message_comp','Post created successfully');
        $this->dispatchBrowserEvent('hide-modal', []);
    
    }
    public function postContent(){
        $validatedDate = $this->validate(
            [
             'post_content' => ['required'],
             'image' => 'sometimes|nullable|image|max:1024', 
             'video' => 'sometimes|nullable|mimes:mp4,mov,ogg,qt | max:20000',
             ]);
           //  dd($this->image);
             if(!empty($validatedDate['image']))
             {
              
                $path=$this->image->store('public/post/images');
                $write_path=storage_path('app/public/post/images/'.basename($path));
               
                $t=Image::make($write_path)->resize(777,null,function($constraint)
                {
                    $constraint->aspectRatio();
                })->save($write_path);
                $validatedDate['featured_image']=basename($path);
              
                 }
        //dd($validatedDate);
        if(!empty($validatedDate['video'])){
           $path= $this->video->store('public/post/videos');
           $validatedDate['video']=basename($path);
           
        }
        if(strlen(trim($this->post_content))>0)
            {  
               
                $validatedDate['details']=$validatedDate['post_content'];
              
                $validatedDate['user_id']=auth()->user()->id;
              // dd($validatedDate);
                $post=Post::create($validatedDate);
                 Point::create(['points' => 10,'user_id'=>auth()->id(),'post_id'=>$post->id]);
          
                $this->resetFields();
        }
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
            $this->emitSelf('added');
        }
        public function likePost($id){
            if(!LikeContentType::where(['user_id'=>auth()->id(),'content_id'=>$id,'content_type'=>'Post'])->exists())
            {
             Post::where('id',$id)->increment('like_count',1);
             LikeContentType::create(['user_id'=>auth()->id(),'content_id'=>$id,'content_type'=>'Post']);
            }
            else
            {
                Post::where('id',$id)->decrement('like_count',1);
                LikeContentType::where(['user_id'=>auth()->id(),'content_id'=>$id,'content_type'=>'Post'])->delete();
 
            }
            $this->emitSelf('added');
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
            $this->emitSelf('added');
           }
}
