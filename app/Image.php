<?php

namespace App;

use App\Galery;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $fillable = ['image', 'galery_id'];

    public function galery()
    {
        return $this->belongsTo(Galery::class);
    }
}
