<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
     protected $guarded=['id'];

     public function bankingDetails(){
         return $this->hasOne(ApplicantBankingDetail::class,
                                'id','applicant_banking_details_id');
     }
     public function personalDetails(){
         return $this->hasOne(ApplicantPersonalDetail::class,
                              'id','applicant_personal_info_id');
     }
     public function serviceType(){
         return $this->hasOne(ApplicantServiceType::class,
                        'id','applicant_service_type_id');
     }
     public function location(){
         return $this->belongsTo(FtthLocation::class);
     }
}
