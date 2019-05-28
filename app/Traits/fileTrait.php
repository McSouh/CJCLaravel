<?php 

namespace App\Traits;

use Illuminate\Support\Facades\Storage;

trait FileTrait
{
    public function uploadFile()
    {
        $file = request()->file('file');
        
        $name = time() . $file->getClientOriginalName();
        $folder = 'uploads/file/';
        $dir = $folder . $name;
        $path = $file->store($dir);
        
        return '/'. $path;
    }
    public function deletefile($path)
    {
        if(strpos($path, '/uploads/') !== false){
            Storage::delete($path);
        }
    }
}