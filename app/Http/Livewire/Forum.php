<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Forum AS ForumModel;
use Livewire\WithFileUploads;
use Image;
class Forum extends Component
{
    use WithFileUploads;
    public $forum_list=[],$title,$details,$feature_image,$old_feature_image,$search,$selected_forum;
    public function mount(){
        $this->title='';
        $this->details='';
        $this->feature_image='';
         
    }
    public function render()
    {
        $forums= ForumModel::where('status','Active');
        
        if($this->search)
        $forums= $forums->where('title','like','%'.$this->search.'%');
        $forums= $forums->paginate('10');
       
       return view('livewire.forum',compact('forums'));
       // return view('livewire.forum');
    }
    public function reset1(){
        $this->title='';
        $this->details='';
        $this->feature_image='';
    }
    public function store(){
        $validatedDate = $this->validate(
            ['title' => ['required', 'string', 'max:255'],
             'details' => ['required'],
             'feature_image' => 'image|max:2048',
            ],['details.required'=>'Description is required']);
        //dd($validatedDate);
        if ($this->feature_image)
            {
                $path = $this
                    ->feature_image
                    ->store('public/forum');
              
              $write_path=storage_path('app/public/forum/'.basename($path));
              $t=Image::make( $write_path)->resize(777,null,function($constraint)
              {
                  $constraint->aspectRatio();
              })->save($write_path);
              $validatedDate['featured_image']=basename($path);
            }
            unset($validatedDate['feature_image']);
           ForumModel::create( $validatedDate);
           $this->reset1();
          $this->dispatchBrowserEvent('forum-done');
           session()->flash('message_comp','Forum successfully created');
          
    }
    public function edit($id){
       // dd($id);
        $this->selected_forum=$id;
       $f=ForumModel::findOrFail($id);
       $this->title=$f->title;
       $this->details=$f->details;
      // dd($this->details);
       $this->feature_image=$f->featured_image;
       $this->old_feature_image=$f->old_feature_image;
    }
    public function update(){
        $validatedDate = $this->validate(
            ['title' => ['required', 'string', 'max:255'],
             'details' => ['required'],
             'feature_image' => 'sometimes|nullable|image|max:2048',
            ],['details.required'=>'Description is required']);
        
        if ($this->feature_image)
            {
               // dd('ih');
                if($this->old_feature_image && file_exists(storage_path('app/public/forum/'.$this->old_feature_image)))
                    unlink(storage_path('app/public/forum/'.$this->old_feature_image));
                $path = $this
                    ->feature_image
                    ->store('public/forum');
               
                $write_path=storage_path('app/public/forum/'.basename($path));
                $t=Image::make( $write_path)->resize(777,null,function($constraint)
                {
                    $constraint->aspectRatio();
                })->save($write_path);
              $validatedDate['featured_image']=basename($path);
           }
           unset($validatedDate['feature_image']);
           ForumModel::where('id',$this->selected_forum)->update($validatedDate);
           $this->dispatchBrowserEvent('forum-done');
           session()->flash('message_comp','Forum successfully updated');
    }
public function delete($id){
    $f=ForumModel::findOrFail($id);
    if($f->feature_image && file_exists('storage/app/public/forum/'.$f->feature_image))
         unlink(storage_path('app/public/forum/'.$f->feature_image));
         ForumModel::where('id',$id)->delete()     ;
    session()->flash('message_comp','Forum successfully deleted');     
}
}
