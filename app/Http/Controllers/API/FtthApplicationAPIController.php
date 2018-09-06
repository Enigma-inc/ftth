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
use App\PackagesLookup;
use App\User;
use Illuminate\Support\Facades\Hash;

/**
 * Class FtthApplicationController
 * @package App\Http\Controllers\API
 */

class FtthApplicationAPIController extends AppBaseController
{
    /** @var  FtthApplicationRepository */
    private $ftthApplicationRepository;
    private $serviceTypeRepository;

    public function __construct(
        FtthApplicationRepository $ftthApplicationRepo,
        ApplicantServiceTypeRepository $serviceTypeRepo
    ) {
        $this->ftthApplicationRepository = $ftthApplicationRepo;
        $this->serviceTypeRepository = $serviceTypeRepo;

    }

    /**
     * Display a listing of the FtthApplication.
     * GET|HEAD /ftthApplications
     *
     * @param Request $request
     * @return Response
     */

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
        
        //Register User
        $user = User::firstOrCreate(['email' => $request->email], [
            'name' => $request->name . ' ' . $request->surname,
            'password' => Hash::make($request->password),
            'email' => $request->email
        ]);
        $package = PackagesLookup::findOrFail($request->package);
        if (!$package) {
            return $this->sendError('Package not found!');
        }
         //SAVE SERVICE TYPE
        $serviceTypeModel = [
            'serviceType' => $request->serviceType,
            'package' => $package->data_bundle
        ];
        $saveServiceTypeDetails = $this->serviceTypeRepository->pushToDb($serviceTypeModel);

       

        //Extract Application Details
        $applicationDetails = [
            'name' => $request->name,
            'surname' => $request->surname,
            'email' => $request->email,
            'phone' => $request->phone,
            'user_id' => $user->id,
            'location_id' => $request->location,
            'applicant_service_type_id' => $saveServiceTypeDetails->id,



        ];


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
