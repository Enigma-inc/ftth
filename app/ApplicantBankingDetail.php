<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ApplicantBankingDetail extends Model
{
     protected $guarded=['id'];
     protected $hidden=['created_at','updated_at'];

    public function application(){
        $this->belongsTo(Application::class);
    }
}
