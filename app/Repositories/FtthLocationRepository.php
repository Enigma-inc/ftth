<?php

namespace App\Repositories;

use App\Models\FtthLocation;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class FtthLocationRepository
 * @package App\Repositories
 * @version February 21, 2018, 4:56 pm UTC
 *
 * @method FtthLocation findWithoutFail($id, $columns = ['*'])
 * @method FtthLocation find($id, $columns = ['*'])
 * @method FtthLocation first($columns = ['*'])
*/
class FtthLocationRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'description'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return FtthLocation::class;
    }
}
