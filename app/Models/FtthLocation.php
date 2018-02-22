<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class FtthLocation
 * @package App\Models
 * @version February 21, 2018, 4:56 pm UTC
 *
 * @property  name
 * @property  description
 */
class FtthLocation extends Model
{
    use SoftDeletes;

    public $table = 'ftth_locations';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'name',
        'description'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required'
    ];

    
}
