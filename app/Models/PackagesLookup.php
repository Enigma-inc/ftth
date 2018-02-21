<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class PackagesLookup
 * @package App\Models
 * @version February 21, 2018, 7:03 pm UTC
 *
 * @property string data_bundle
 * @property float price
 * @property string type
 */
class PackagesLookup extends Model
{
    use SoftDeletes;

    public $table = 'packages_lookup';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'data_bundle',
        'price',
        'type'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'data_bundle' => 'string',
        'price' => 'float',
        'type' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'data_bundle' => 'required',
        'price' => 'required',
        'type' => 'required'
    ];

    
}
