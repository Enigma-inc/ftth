<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class ApplicantPersonalDetails
 * @package App\Models
 * @version March 6, 2018, 10:17 am UTC
 *
 * @property string name
 * @property string title
 * @property string surname
 * @property string email
 * @property string identity_number
 * @property string mobile_phone
 * @property string home_phone
 * @property string office_phone
 * @property string postal_address
 * @property string physical_address
 */
class ApplicantPersonalDetails extends Model
{
    use SoftDeletes;

    public $table = 'applicant_personal_details';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'title',
        'name',
        'surname',
        'email',
        'identity_number',
        'mobile_phone',
        'home_phone',
        'office_phone',
        'postal_address',
        'physical_address'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'name' => 'string',
        'title' => 'string',
        'surname' => 'string',
        'email' => 'string',
        'identity_number' => 'string',
        'mobile_phone' => 'string',
        'home_phone' => 'string',
        'office_phone' => 'string',
        'postal_address' => 'string',
        'physical_address' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required',
        'title' => 'required',
        'surname' => 'required',
        'email' => 'required',
        'identity_number' => 'required',
        'mobile_phone' => 'required',
        'postal_address' => 'required',
        'physical_address' => 'required'
    ];



    
}
