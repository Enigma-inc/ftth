<?php

namespace App\Repositories;

use App\Models\ApplicantPersonalDetails;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class ApplicantPersonalDetailsRepository
 * @package App\Repositories
 * @version March 6, 2018, 10:17 am UTC
 *
 * @method ApplicantPersonalDetails findWithoutFail($id, $columns = ['*'])
 * @method ApplicantPersonalDetails find($id, $columns = ['*'])
 * @method ApplicantPersonalDetails first($columns = ['*'])
*/
class ApplicantPersonalDetailsRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'title',
        'surname',
        'email',
        'identity_number',
        'mobile_phone',
        'home_phone',
        'office_phone',
        'postal_address',
        'physical_address',
        'identity_number'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return ApplicantPersonalDetails::class;
    }

    public function pushToDb(array $attributes)
    {
        $personalDetails = [
            'title' => $attributes['title'], 'name' => $attributes['name'], 'surname' => $attributes['surname'],
            'email' => $attributes['email'], 'mobile_phone' => $attributes['phoneMobile'], 'phone_office' => $attributes['phoneHome'],
            'phone_home' => $attributes['phoneHome'], 'postal_address' => $attributes['postalAddress'],
            'physical_address' => $attributes['physicalAddress'], 'identity_number' => $attributes['passport'], 'location_id' => $attributes['location']
        ];
        return $this->create($personalDetails);
    }
}
