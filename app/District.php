<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    public function requests()
    {
        return $this->hasMany(Survey::class,'district_id');
    }
}
