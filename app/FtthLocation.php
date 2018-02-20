<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FtthLocation extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $fillable=['name'];
}
