<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Survey extends Model
{
    protected $guarded=['id'];

    function location()
    {
        return $this->belongsTo(Location::class,'location_id');
    }

    function district(){
        return $this->belongsTo(District::class,'district_id');
    }

    function fullNames(){
        return $this->name." ".$this->surname;
    }

}
