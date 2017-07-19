<?php

namespace App\Http\Controllers;

use App\Application;
use Illuminate\Http\Request;
use App\Http\Requests\ApplicationRequest;
use App\Http\Requests\ServiceTypeRequest;
use App\Http\Requests\BankingDetailsRequest;
use App\ApplicantPersonalDetail;
use App\FtthLocation;
use App\ApplicantServiceType;
use App\ApplicantBankingDetail;
use Auth;

class ApplicationsController extends Controller
{
  function __construct()
    {
        $this->middleware(['auth']);
    }

    public function create()
    {
        $locations=FtthLocation::all();
        return view('application.create')->with(['locations'=>$locations]);
    }

    public function addApplication(ApplicationRequest $request,$applicationId, $personalDetailsId)
    {
            $application=Application::firstOrNew(['id'=>$applicationId]);
            $personalDetails=ApplicantPersonalDetail::firstOrNew(['id'=>$personalDetailsId]); 
            $personalDetails->name=request('name');
            $personalDetails->surname=request('surname');
            $personalDetails->email=request('email');
            $personalDetails->home_phone=request('phoneHome');
            $personalDetails->office_phone=request('phoneOffice');
            $personalDetails->mobile_phone=request('phoneMobile');
            $personalDetails->identity_number=request('passport');
            $personalDetails->postal_address=request('postalAddress');
            $personalDetails->physical_address=request('physicalAddress');
            $personalDetails->save();
           
      
        
           $application->user_id = Auth::User()->id;
           $application->applicant_personal_info_id=$personalDetails->id;
           $application->location_id=request('location');
           $application->next_step=2; //
           
           $application->save();

        return ['application'=>$application,'personalDetails'=>$personalDetails];
    }
    public function addServiceType(ServiceTypeRequest $request,$applicationId, $serviceTypeId)
    {
            $application=Application::find($applicationId);
            
            if(is_null($application))
            {
                return response('Application Not Found',404);
            }
            else
            {
                
                    $serviceType=ApplicantServiceType ::firstOrNew(['id'=>$serviceTypeId]); 

                    $serviceType->service_type=request('serviceType');
                    $serviceType->data_package=request('package');
                    $serviceType->is_adsl_customer=request('adslCustomer');
                    $serviceType->adsl_number=request('adslNumber');
                    $serviceType->save();

                    $application->applicant_service_type_id=$serviceType->id;
                    $application->next_step=3; //
                    
                    $application->save();
                    

                    return ['application'=>$application,'serviceType'=>$serviceType];
            }
        
    }
    public function addBankingDetails(BankingDetailsRequest $request,$applicationId, $BankingDetailsId)
    {
            $application=Application::find($applicationId);
            
            if(is_null($application))
            {
                return response('Application Not Found',404);
            }
            else
            {
                
                    $bankingDetails=ApplicantBankingDetail::firstOrNew(['id'=>$BankingDetailsId]); 

                    $bankingDetails->bank_name=request('bankName');
                    $bankingDetails->branch_name=request('branchName');
                    $bankingDetails->branch_code=request('branchCode');
                    $bankingDetails->account_name=request('accountHolderName');
                    $bankingDetails->account_type=request('accountType');
                    $bankingDetails->account_number=request('accountNumber');
                    $bankingDetails->save();

                    $application->applicant_banking_details_id=$bankingDetails->id;
                    $application->is_complete=true;
                    $application->next_step=null; //
                    $application->mail_send=false; //Mail is ready to be send
                    $application->save();
                    

                    return ['application'=>$application,'bankingDetails'=>$bankingDetails];
            }
        
    }
    public function show(Application $application)
    {
        //
    }


    public function edit(Application $application)
    {
        //
    }


    public function update(Request $request, Application $application)
    {
        //
    }


    public function destroy(Application $application)
    {
        //
    }
}
