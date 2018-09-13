<?php

namespace App\Http\Controllers;

use App\Application;
use Illuminate\Http\Request;
use App\Http\Requests\ApplicationRequest;
use App\Http\Requests\ServiceTypeRequest;
use App\Http\Requests\UpdateFtthApplicationRequest;
use App\Http\Requests\BankingDetailsRequest;
use App\ApplicantPersonalDetail;
use App\FtthLocation;
use App\ApplicantServiceType;
use App\ApplicantBankingDetail;
use Auth;
use App\Http\Requests\API\CreateFtthApplicationAPIRequest;
use App\User;
use App\PackagesLookup;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Repositories\FtthApplicationRepository;
use App\Repositories\ApplicantServiceTypeRepository;
use Illuminate\Support\Facades\Hash;
use Flash;



class ApplicationsController extends Controller
{
    use AuthenticatesUsers;

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
     * Display a listing of the Applications.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        if (Auth::user()->is_admin)
            {
             $applications=Application::all();
             return view('admin.ftth_applications.index')
                    ->with('ftthApplications', $applications);
            }
         else if(!Auth::user()->is_admin){
            $applications = Application::where('user_id', Auth::user()->id)->get();
            return view('admin.ftth_applications.personal_index')
                ->with('ftthApplications', $applications); 
         }
         else{
            return redirect(route('ftth.home'));
         }
    }
    
    public function create()
    {

        $locations = FtthLocation::all();
        $services = ApplicantServiceType::all();
        
        return view('application.create')->with(['locations' => $locations, 'services' => $services]);
    }


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

        $this->login($request);

        $ftthApplication = $this->ftthApplicationRepository->placeApplication($applicationDetails);

    
        return response() ->json($ftthApplication->toArray());
    }

    public function placeApplication(ApplicationRequest $request)
    {
    
        $application = Application::create();
        $personalDetails = ApplicantPersonalDetail::create();
        $personalDetails->name = request('name');
        $personalDetails->surname = request('surname');
        $personalDetails->email = request('email');
        $personalDetails->home_phone = request('phoneHome');
        $personalDetails->office_phone = request('phoneOffice');
        $personalDetails->mobile_phone = request('phoneMobile');
        $personalDetails->identity_number = request('passport');
        $personalDetails->postal_address = request('postalAddress');
        $personalDetails->physical_address = request('physicalAddress');
        $personalDetails->save();


        $application->user_id = Auth::User()->id;
        $application->applicant_personal_info_id = $personalDetails->id;
        $application->location_id = request('location');
        $application->next_step = 2; //

           //Submit Service Type
        $this->addServiceType($request, $application->id, $serviceTypeId);

        $application->save();

        return ['application' => $application, 'personalDetails' => $personalDetails];
    }
    private function addServiceType(ApplicationRequest $request, $applicationId, $serviceTypeId)
    {
        $application = Application::find($applicationId);

        $serviceType = ApplicantServiceType::firstOrNew(['id' => $serviceTypeId]);

        $serviceType->service_type = request('serviceType');
        $serviceType->data_package = request('package');
        $serviceType->is_adsl_customer = request('adslCustomer');
        $serviceType->adsl_number = request('adslNumber');
        $serviceType->save();

        $application->applicant_service_type_id = $serviceType->id;
        $application->next_step = 3; //

        $application->save();




    }
    public function addBankingDetails(ApplicationRequest $request, $applicationId, $BankingDetailsId)
    {
        $application = Application::find($applicationId);
        $bankingDetails = ApplicantBankingDetail::firstOrNew(['id' => $BankingDetailsId]);

        $bankingDetails->bank_name = request('bankName');
        $bankingDetails->branch_name = request('branchName');
        $bankingDetails->branch_code = request('branchCode');
        $bankingDetails->account_name = request('accountHolderName');
        $bankingDetails->account_type = request('accountType');
        $bankingDetails->account_number = request('accountNumber');
        $bankingDetails->save();

        $application->applicant_banking_details_id = $bankingDetails->id;
        $application->is_complete = true;
        $application->next_step = null; //
        $application->mail_send = false; //Mail is ready to be send
        $application->save();


    }
  

    /**
     * Show the form for editing the specified FtthApplication.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        
        $locations = FtthLocation::all();
        $services= ApplicantServiceType::all();
        $ftthApplication = $this->ftthApplicationRepository->findWithoutFail($id);

        if (empty($ftthApplication)) {
            Flash::error('Ftth Application not found');

            return redirect(route('ftthApplications.index'));
        }
        return view('admin.ftth_applications.edit')->with(['ftthApplication'=>$ftthApplication, 'locations'=> $locations, 'services'=> $services]);
    }




    public function mainapplication( UpdateFtthApplicationRequest $request)
    {    
        
        $input = $request->all();
        $input['is_complete'] = $request->is_complete == null ? false : true;
        $input['is_billing_agreed'] = $request->is_billing_agreed == null ? false : true;
        $input['is_inspected'] = $request->is_inspected == null ? false : true;
        $input['is_approved'] = $request->is_approved == null ? false : true;
        $input['is_installed'] = $request->is_installed == null ? false : true;
        $input['next_step'] =2;

        $ftthApplication = $this->ftthApplicationRepository->updateOrCreate(['id' => $request->id], $input);
        Flash::success('Application personal details and status saved successfully.');
        return redirect(route('ftthApplications.edit', [$request->id]));
    }

    public function applicationservice(ServiceTypeRequest $request)
    {
    
        $application = Application::find($request->id);
        $serviceType = ApplicantServiceType::firstOrNew(['id' => $request->applicant_service_type_id]);
       
        $serviceType->service_type = $serviceType->service_type;
        $serviceType->data_package = $serviceType->data_package;
        $serviceType->is_adsl_customer = $request->is_adsl_customer == null ? false : true;
        $serviceType->adsl_number = $request->adsl_number;
        $serviceType->save();
        
        $application->applicant_service_type_id = $serviceType->id;
        $application->next_step = 3; //

        $application->save();


        return redirect(route('ftthApplications.edit',[$request->id]));
    }

    public function applicationbankingdetails(BankingDetailsRequest $request)
    {
        

        $application = Application::find($request->id);
        $bankingDetails = ApplicantBankingDetail::firstOrNew(['id' => $application->banking_details_id]);

        $bankingDetails->bank_name = request('bankName');
        $bankingDetails->branch_name = request('branchName');
        $bankingDetails->branch_code = request('branchCode');
        $bankingDetails->account_name = request('accountHolderName');
        $bankingDetails->account_type = request('accountType');
        $bankingDetails->account_number = request('accountNumber');
        $bankingDetails->save();

        $application->banking_details_id = $bankingDetails->id;
        $application->is_complete = true;
        $application->next_step = null; //
        $application->mail_send = false; //Mail is ready to be send
        $application->save();

        Flash::success('Application banking details successfully.');
        return redirect(route('ftthApplications.edit', [$request->id]));
 
    }
    /**
     * Remove the specified FtthApplication from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $ftthApplication = $this->ftthApplicationRepository->findWithoutFail($id);

        if (empty($ftthApplication)) {
            Flash::error('Ftth Application not found');

            return redirect(route('ftthApplications.index'));
        }

        $this->ftthApplicationRepository->delete($id);

        Flash::success('Ftth Application deleted successfully.');

        return redirect(route('ftthApplications.index'));
    }


    /**
     * Display the specified FtthApplication.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $ftthApplication = $this->ftthApplicationRepository->findWithoutFail($id);

        if (empty($ftthApplication)) {
            Flash::error('Ftth Application not found');

            return redirect(route('ftthApplications.index'));
        }

        return view('admin.ftth_applications.show')->with('ftthApplication', $ftthApplication);
    }



}
