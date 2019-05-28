<?php 

namespace App\Traits;

use Illuminate\Support\Facades\Storage;
use Image;

trait ImageTrait
{
    public function uploadImage()
    {
        $image = request()->file('image');
        $name = str_slug(time() . '.' . $image->getClientOriginalName()) . '.' . $image->getClientOriginalExtension();
        $folder = 'uploads/image/';
        $path = $folder . $name;
        Image::make($image)->save($path);
        
        return '/'. $path;
    }
    public function deleteImage($path)
    {
        if(strpos($path, '/uploads/') !== false){
            Storage::delete($path);
        }
    }
}