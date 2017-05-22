<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
     protected $guarded=['id'];

     public function bankingDetails(){
         return $this->hasOne(BankingDetail::class);
     }
}
