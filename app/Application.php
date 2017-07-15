<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
     protected $guarded=['id'];

     public function bankingDetails(){
         return $this->hasOne(ApplicantBankingDetail::class);
     }
     public function personalDetails(){
         return $this->hasOne(ApplicantPersonalDetail::class);
     }
     public function serviceTYpe(){
         return $this->hasOne(ApplicantServiceType::class);
     }
     public function location(){
         return $this->belongsTo(Location::class);
     }
}
