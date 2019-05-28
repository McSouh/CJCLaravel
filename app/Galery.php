<?php

namespace App;

use App\Image;
use Illuminate\Database\Eloquent\Model;

class Galery extends Model
{
    protected $fillable = ['title'];

    public function images()
    {
        return $this->hasMany(Image::class);
    }
}
