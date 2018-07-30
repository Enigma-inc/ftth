<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class ApplicantBanking
 * @package App\Models
 * @version March 6, 2018, 8:29 am UTC
 *
 * @property string bank_name
 * @property string branch_name
 * @property string branch_code
 * @property string account_name
 * @property string account_type
 */
class ApplicantBanking extends Model
{
    use SoftDeletes;

    public $table = 'applicant_banking_details';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'bank_name',
        'branch_name',
        'branch_code',
        'account_name',
        'account_type',
        'account_number'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'bank_name' => 'string',
        'branch_name' => 'string',
        'branch_code' => 'string',
        'account_name' => 'string',
        'account_type' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'bank_name' => 'required',
        'branch_name' => 'required',
        'branch_code' => 'required',
        'account_name' => 'required',
        'account_type' => 'required'
    ];

    
}
