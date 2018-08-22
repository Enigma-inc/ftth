<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class ApplicantServiceType
 * @package App\Models
 * @version March 5, 2018, 3:26 pm UTC
 *
 * @property string service_type
 * @property string data_package
 * @property boolean is_adsl_customer
 * @property string adsl_number
 */
class ApplicantServiceType extends Model
{
    use SoftDeletes;

    public $table = 'applicant_service_types';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'service_type',
        'data_package',
        'is_adsl_customer',
        'adsl_number'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'service_type' => 'string',
        'data_package' => 'string',
        'is_adsl_customer' => 'boolean',
        'adsl_number' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'service_type' => 'required',
        'data_package' => 'required',
        'is_adsl_customer' => 'required',
    ];

    
}
