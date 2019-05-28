<?php 

namespace App\Traits;

use Illuminate\Support\Facades\Storage;
use Image;

trait ImagesTrait
{
    public function uploadImages($image)
    {
        $name = str_slug(time() . '.' . $image->getClientOriginalName()) . '.' . $image->getClientOriginalExtension();
        $folder = 'uploads/image/';
        $path = $folder . $name;
        Image::make($image)
        ->orientate()
        ->resize(null, 200, function ($constraint) {
            $constraint->aspectRatio();
        })
        ->save($path);
        
        return '/'. $path;
    }
    public function deleteImage($path)
    {
        if(strpos($path, '/uploads/') !== false){
            Storage::delete($path);
        }
    }
}