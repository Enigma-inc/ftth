<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Location extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $guarded= ['id'];
    protected $hidden=['created_at','updated_at'];
    protected $fillable=['name'];

    public function requests(){
        return $this->hasMany(Survey::class,'location_id');
    }

    public function applications(){
        return $this->hasMany(Application::class);
    }
}

