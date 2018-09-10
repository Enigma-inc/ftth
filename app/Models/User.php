<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class User
 * @package App\Models
 * @version September 6, 2018, 9:08 am UTC
 *
 * @property string name
 * @property string email
 * @property string password
 */
class User extends Model
{
    
    public $table = 'users';
    
    public $fillable = [
        'name',
        'email',
        'password',
        'is_admin'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'name' => 'string',
        'email' => 'string',
        'password' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required',
        'email' => 'required|unique:users',
        'password' => 'required'
    ];



    /**
     * Validation rules
     *
     * @var array
     */
    public static $updateUserRules = [
        'name' => 'required',
        'email' => 'required',
        'password' => 'required'
    ];

    
}
