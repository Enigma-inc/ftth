<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BankingDetail extends Model
{
    protected $guarded=['id'];

    public function application(){
        return $this->belongsTo(Application::class);
    }
}

