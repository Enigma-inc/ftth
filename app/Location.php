<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    protected $guarded= ['id'];

    function requests(){
        return $this->hasMany(Survey::class,'location_id');
    }
}

