<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateFtthApplicationAPIRequest;
use App\Http\Requests\API\UpdateFtthApplicationAPIRequest;
use App\Models\FtthApplication;
use App\Repositories\FtthApplicationRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use App\Repositories\ApplicantServiceTypeRepository;
use App\Repositories\ApplicantBankingRepository;
use App\Repositories\ApplicantPersonalDetailsRepository;
use Illuminate\Support\Facades\Auth;

/**
 * Class FtthApplicationController
 * @package App\Http\Controllers\API
 */

class FtthApplicationAPIController extends AppBaseController
{
    /** @var  FtthApplicationRepository */
    private $ftthApplicationRepository;
    private $serviceTypeRepository;
    private $bankingRepository;
    private $personalDetailsRepository;

    public function __construct(
        FtthApplicationRepository $ftthApplicationRepo,
        ApplicantServiceTypeRepository $serviceTypeRepo,
        ApplicantBankingRepository $bankingRepo,
        ApplicantPersonalDetailsRepository $personalDetailsRepo
    ) {
        $this->ftthApplicationRepository = $ftthApplicationRepo;
        $this->serviceTypeRepository = $serviceTypeRepo;
        $this->bankingRepository = $bankingRepo;
        $this->personalDetailsRepository = $personalDetailsRepo;

    }

    /**
     * Display a listing of the FtthApplication.
     * GET|HEAD /ftthApplications
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->ftthApplicationRepository->pushCriteria(new RequestCriteria($request));
        $this->ftthApplicationRepository->pushCriteria(new LimitOffsetCriteria($request));
        $ftthApplications = $this->ftthApplicationRepository->all();

        return $this->sendResponse($ftthApplications->toArray(), 'Ftth Applications retrieved successfully');
    }

    /**
     * Store a newly created FtthApplication in storage.
     * POST /ftthApplications
     *
     * @param CreateFtthApplicationAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateFtthApplicationAPIRequest $request)
    {
        
        //SAVE BANKING DETAILS
        // $savedBankingDetails = $this->bankingRepository->pushToDb($request->all());      

        //SAVE SERVICE TYPE
        // $saveServiceTypeDetails = $this->serviceTypeRepository->pushToDb($request->all());

        //SAVE PERSONAL DETAILS
        // $savedBankingDetails->id, $saveServiceTypeDetails->id
        $savedPersonalDetails = $this->personalDetailsRepository->pushToDb($request->all());

        //Extract Application Details
        $applicationDetails = [
            'user_id' => 1,
            'location_id' => $request->location,
            'applicant_personal_details_id' => $savedPersonalDetails->id,
            'applicant_banking_details_id' => $savedBankingDetails->id,
            'applicant_service_type_id' => $saveServiceTypeDetails->id


        ];
     //   $table->float('amount')->default(0);


        $ftthApplication = $this->ftthApplicationRepository->placeApplication($applicationDetails);

        return $this->sendResponse($ftthApplication->toArray(), 'Ftth Application saved successfully');
    }

    /**
     * Display the specified FtthApplication.
     * GET|HEAD /ftthApplications/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    // public function show($id)
    // {
    //     /** @var FtthApplication $ftthApplication */
    //     $ftthApplication = $this->ftthApplicationRepository->findWithoutFail($id);

    //     if (empty($ftthApplication)) {
    //         return $this->sendError('Ftth Application not found');
    //     }

    //     return $this->sendResponse($ftthApplication->toArray(), 'Ftth Application retrieved successfully');
    // }

    /**
     * Update the specified FtthApplication in storage.
     * PUT/PATCH /ftthApplications/{id}
     *
     * @param  int $id
     * @param UpdateFtthApplicationAPIRequest $request
     *
     * @return Response
     */
    // public function update($id, UpdateFtthApplicationAPIRequest $request)
    // {
    //     $input = $request->all();

    //     /** @var FtthApplication $ftthApplication */
    //     $ftthApplication = $this->ftthApplicationRepository->findWithoutFail($id);

    //     if (empty($ftthApplication)) {
    //         return $this->sendError('Ftth Application not found');
    //     }

    //     $ftthApplication = $this->ftthApplicationRepository->update($input, $id);

    //     return $this->sendResponse($ftthApplication->toArray(), 'FtthApplication updated successfully');
    // }

    /**
     * Remove the specified FtthApplication from storage.
     * DELETE /ftthApplications/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    // public function destroy($id)
    // {
    //     /** @var FtthApplication $ftthApplication */
    //     $ftthApplication = $this->ftthApplicationRepository->findWithoutFail($id);

    //     if (empty($ftthApplication)) {
    //         return $this->sendError('Ftth Application not found');
    //     }

    //     $ftthApplication->delete();

    //     return $this->sendResponse($id, 'Ftth Application deleted successfully');
    // }
}
