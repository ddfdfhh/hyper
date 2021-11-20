<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\User;
use Image;
class Banner extends Component
{
    use WithFileUploads;
    public $banner, $base;
  
    public function mount()
    {
        $t = User::find(auth()->id())->banner;
        if (empty($t) || !file_exists(public_path("storage/banner/" . $t))) {
            $this->banner = asset("assets/frontend/img-profile") . "/cover.jpg";
        } else {
            $this->banner = asset("storage/banner/" . $t);
        }
    }
    public function render()
    {
        return view("livewire.banner");
    }
    public function save()
    {
      
        $imageName = "";
        if ($this->base) {
            try {
                $folderPath = storage_path("app/public/banner/");

                $image_parts = explode(";base64,", $this->base);
                $image_type_aux = explode("image/", $image_parts[0]);
                $image_type = $image_type_aux[1];
                $image_base64 = base64_decode($image_parts[1]);

                $imageName = uniqid() . ".jpeg";
                $imageFullPath = $folderPath . $imageName;

                $t = Image::make($image_base64);
                $t->resize(1400, 226)->save($imageFullPath);
            } catch (Exception $e) {
                session()->flash("error_comp", "error occured");
            }
        }
        $me = User::find(auth()->id());

        $me->banner = $imageName;
        $me->save();
        $this->dispatchBrowserEvent("banner-saved");
    }
}
