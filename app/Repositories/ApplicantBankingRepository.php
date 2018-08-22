<?php

namespace App\Repositories;

use App\Models\ApplicantBanking;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class ApplicantBankingRepository
 * @package App\Repositories
 * @version March 6, 2018, 8:29 am UTC
 *
 * @method ApplicantBanking findWithoutFail($id, $columns = ['*'])
 * @method ApplicantBanking find($id, $columns = ['*'])
 * @method ApplicantBanking first($columns = ['*'])
*/
class ApplicantBankingRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'bank_name',
        'branch_name',
        'branch_code',
        'account_name',
        'account_type'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return ApplicantBanking::class;
    }

    public function pushToDb(array $attributes)
    {
        $bankingDetails = [
            'bank_name' => $attributes['bankName'], 'branch_name' => $attributes['branchName'], 'branch_code' => $attributes['branchCode'],
            'account_name' => $attributes['accountHolderName'], 'account_type' => $attributes['accountType'], 'account_number' => $attributes['accountNumber']
        ];
       return  $this->create($bankingDetails); 
    }
}
