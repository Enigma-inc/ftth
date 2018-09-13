<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    protected $guarded = ['id'];
    
    public function serviceType()
    {
        return $this->hasOne(
            ApplicantServiceType::class,
            'id',
            'applicant_service_type_id'
        );
    }
    public function location()
    {
        return $this->belongsTo(FtthLocation::class);
    }

}