<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
Use App\Survey;
use  App\Application;

/**
 * Class Location
 * @package App\Models
 * @version February 21, 2018, 5:18 pm UTC
 *
 * @property string name
 */
class Location extends Model
{
    use SoftDeletes;

    public $table = 'locations';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'name'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'name' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required'
    ];
    public function requests()
    {
        return $this->hasMany(Survey::class, 'location_id');
    }

    public function applications()
    {
        return $this->hasMany(Application::class);
    }
    
}
