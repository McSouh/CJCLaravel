<?php

namespace App;

use App\Delegue;
use Illuminate\Database\Eloquent\Model;

class Comite extends Model
{
    protected $fillable = ['year'];

    public function delegues()
    {
        return $this->hasMany(Delegue::class);
    }
}
