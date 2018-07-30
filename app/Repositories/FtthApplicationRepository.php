<?php

namespace App\Repositories;

use App\Models\FtthApplication;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class FtthApplicationRepository
 * @package App\Repositories
 * @version March 5, 2018, 9:57 am UTC
 *
 * @method FtthApplication findWithoutFail($id, $columns = ['*'])
 * @method FtthApplication find($id, $columns = ['*'])
 * @method FtthApplication first($columns = ['*'])
*/
class FtthApplicationRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'title',
        'name',
        'surname',
        'email',
        'phone_mobile',
        'phone_home',
        'phone_office',
        'passport',
        'postal_address',
        'physical_address',
        'location_id',
        'applicant_banking_details_id',
        'applicant_service_type_id'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return FtthApplication::class;
    }

    public function placeApplication(array $attributes)
    {
          return $this->create($attributes);
    }
}
