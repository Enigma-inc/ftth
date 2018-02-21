<?php

namespace App\Repositories;

use App\Models\PackagesLookup;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class PackagesLookupRepository
 * @package App\Repositories
 * @version February 21, 2018, 7:03 pm UTC
 *
 * @method PackagesLookup findWithoutFail($id, $columns = ['*'])
 * @method PackagesLookup find($id, $columns = ['*'])
 * @method PackagesLookup first($columns = ['*'])
*/
class PackagesLookupRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'data_bundle',
        'price',
        'type'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return PackagesLookup::class;
    }
}
