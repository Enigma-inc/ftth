<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    protected $guarded= ['id'];

    public function requests(){
        return $this->hasMany(Survey::class,'location_id');
    }

    public function applications(){
        return $this->hasMany(Application::class);
    }
}

