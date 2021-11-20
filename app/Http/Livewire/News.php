<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\News AS NewsModel;
use Livewire\WithFileUploads;
use Image;
class News extends Component
{
    use WithFileUploads;
   
    public $news_list=[],$title,$details,$old_feature_image,$search,$selected_news;
    public function mount(){
        $this->title='';
        $this->details='';
        $this->feature_image='';
         
    }
    public function render()
    {
        $news= NewsModel::where('status','Active');
        
        if($this->search)
        $news= $news->where('title','like','%'.$this->search.'%');
        $news= $news->paginate('10');
       
       return view('livewire.news',compact('news'));
       // return view('livewire.forum');
    }
    public function reset1(){
        $this->news=null;
       
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
                    ->store('public/news');
              
              $write_path=storage_path('app/public/news/'.basename($path));
              $t=Image::make( $write_path)->resize(777,null,function($constraint)
              {
                  $constraint->aspectRatio();
              })->save($write_path);
              $validatedDate['featured_image']=basename($path);
            }
            unset($validatedDate['feature_image']);
           NewsModel::create( $validatedDate);
           $this->reset1();
          $this->dispatchBrowserEvent('news-done');
           session()->flash('message_comp','News successfully created');
          
    }
    public function edit($id){
       // dd($id);
        $this->selected_news=$id;
       $f=NewsModel::findOrFail($id);
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
                if($this->old_feature_image && file_exists(storage_path('app/public/news/'.$this->old_feature_image)))
                    unlink(storage_path('app/public/news/'.$this->old_feature_image));
                $path = $this
                    ->feature_image
                    ->store('public/forum');
               
                $write_path=storage_path('app/public/news/'.basename($path));
                $t=Image::make( $write_path)->resize(777,null,function($constraint)
                {
                    $constraint->aspectRatio();
                })->save($write_path);
              $validatedDate['featured_image']=basename($path);
           }
           unset($validatedDate['feature_image']);
           NewsModel::where('id',$this->selected_news)->update($validatedDate);
           $this->dispatchBrowserEvent('news-done');
           session()->flash('message_comp','News successfully updated');
    }
public function delete($id){
    $f=NewsModel::findOrFail($id);
    if($f->feature_image && file_exists('storage/app/public/news/'.$f->feature_image))
         unlink(storage_path('app/public/news/'.$f->feature_image));
         NewsModel::where('id',$id)->update(['status'=>'Inactive']);     ;
    session()->flash('message_comp','News successfully deleted');     
}
}
