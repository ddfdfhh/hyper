<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Hyperzone AS HyperzoneModel;
use Image;
class Hyperzone extends Component
{
    use WithFileUploads;
    public $category='mobile-capture',$list=null,$name,$email,$phoneno,$details,$images=[],$video;
    public function render()
    {
        $this->list=HyperzoneModel::where(['user_id'=>auth()->id(),'category'=>$this->category,'status'=>'Approved'])->get();
      
        return view('livewire.hyperzone');
    }
    public function save(){
      
       
        $validatedDate = $this->validate(
            [
             
           'name' => ['required', 'string', 'max:255'],
        //   'email' => ['required', 'string', 'max:255','email'],
        //   'phoneno' => ['required', 'numeric','digits_between:8,12'],
            'details' => ['required'],
            'images.*' => 'sometimes|nullable|image|max:2048', 
            'images' => 'max:3',
            'video' => 'sometimes|nullable|mimes:mp4,mov,ogg,qt',
          ],['details.required'=>'Description is required','images.*.image'=>'Uploaded Image must be true image ','images.*.max'=>'Any image size should not be more than 2MB']);
 //  dd($validatedDate);
                        if(!empty($validatedDate['images'])){
                            $i=1;
                        foreach ($this->images as $photo) {
                            $path=$photo->store('public/hyperzone/images');
                            $write_path=storage_path('app/public/hyperzone/images/'.basename($path));
                            $write_path_thumb=storage_path('app/public/hyperzone/images/thumb/'.basename($path));
                            $t=Image::make( $write_path)->resize(429,null,function($constraint)
                            {
                                $constraint->aspectRatio();
                            })->save($write_path);
                            $t=Image::make($write_path)->resize(210,null,function($constraint)
                            {
                                $constraint->aspectRatio();
                            })->save($write_path_thumb);
                            $validatedDate['image'.$i]=basename($path);
                            ++$i;
                        }
                    }
                     // dd($validatedDate);
                    if($validatedDate['video']){
                       $path= $this->video->store('public/hyperzone/videos');
                       $validatedDate['video']=basename($path);
                       
                    }
            unset($validatedDate['images']);
             $validatedDate['user_id']=auth()->id();
                $validatedDate['category']=$this->category;
                
            HyperzoneModel::create($validatedDate);
            session()->flash('message_comp','Hyperzone content sent to admin for approval ,once approved it will be posted on dashboard');
    }
    public function selectCat($cat){
        $this->category=$cat;
        $this->render();
    }
}
