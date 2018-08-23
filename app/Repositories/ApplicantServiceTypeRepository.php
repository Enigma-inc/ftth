<?php

namespace App\Repositories;

use App\Models\ApplicantServiceType;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class ApplicantServiceTypeRepository
 * @package App\Repositories
 * @version March 5, 2018, 3:24 pm UTC
 *
 * @method ApplicantServiceType findWithoutFail($id, $columns = ['*'])
 * @method ApplicantServiceType find($id, $columns = ['*'])
 * @method ApplicantServiceType first($columns = ['*'])
 */
class ApplicantServiceTypeRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'service_type',
        'data_package',
        'is_adsl_customer',
        'adsl_number'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return ApplicantServiceType::class;
    }

    public function pushToDb(array $attributes)
    {
        $serviceTypeDetails = [
            'service_type' => $attributes['serviceType'], 'data_package' => $attributes['package'],
            'is_adsl_customer' => 0, 'adsl_number' => ''
        ];
        return $this->create($serviceTypeDetails);
    }
}
