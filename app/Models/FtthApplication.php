<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class FtthApplication
 * @package App\Models
 * @version March 5, 2018, 9:57 am UTC
 *
 * @property string title
 * @property string name
 * @property string surname
 * @property string email
 * @property string phone_mobile
 * @property string phone_home
 * @property string phone_office
 * @property string passport
 * @property string postal_address
 * @property string physical_address
 * @property integer location_id
 * @property integer applicant_banking_details_id
 * @property integer applicant_service_type_id
 */
class FtthApplication extends Model
{
    use SoftDeletes;

    public $table = 'ftth_applications';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'user_id',
        'location_id',
        'applicant_banking_details_id',
        'applicant_service_type_id',
        'applicant_personal_details_id',
        'is_billing_agreed',
        'amount'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'applicant_banking_details_id' => 'integer',
        'applicant_service_type_id' => 'integer',
        'applicant_personal_details_id' => 'integer',
        'amount' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required',
        'surname' => 'required',
        'email' => 'required',
        'phoneMobile' => 'required',
        'location' => 'required',
        'package' => 'required',
    ];


}
