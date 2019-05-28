<?php

namespace App;

use App\Comite;
use Illuminate\Database\Eloquent\Model;

class Delegue extends Model
{
    protected $fillable = ['comite_id', 'name', 'poste', 'image'];

    public function comite()
    {
        return $this->belongsTo(Comite::class);
    }
}
