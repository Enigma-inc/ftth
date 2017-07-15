<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ApplicantPersonalDetail extends Model
{
     protected $guarded=['id'];

    public function application(){
        $this->belongsTo(Application::class);
    }
}
