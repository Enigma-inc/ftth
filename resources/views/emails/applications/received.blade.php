@component('mail::message')
 **{{$application->personalDetails->name.' '.$application->personalDetails->surname}}** has placed Application for Econet Fibre , 
 below are the details.

@component('mail::panel')
       **PERSONAL DETAILS**
@endcomponent
@component('mail::table')
|                |    |
| -------------  | --------:|
| **Names**  | {{$application->personalDetails->name.' '.$application->personalDetails->surname}}   |
| **Identity Number**  | {{$application->personalDetails->identity_number}}      |
| **Mobile Phone**  |    {{$application->personalDetails->mobile_phone}}   |
| **Office Phone**  |   {{$application->personalDetails->office_phone}}    |
| **Location**  | {{$application->location->name}}      |
| **Postal Address**  |  {{$application->personalDetails->postal_address}}    |
| **Physical Address**  |  {{$application->personalDetails->physical_address}}   |
@endcomponent


@component('mail::panel')
       **SERVICE TYPE**
@endcomponent
@component('mail::table')
|                |    |
| -------------  | --------:|
| **Service Type**  | {{$application->serviceType->service_type}}   |
| **Package**  | {{$application->serviceType->data_package}}   |
@if($application->serviceType->is_adsl_customer)
| **ADSL Number**  | {{$application->serviceType->adsl_number}}   |
@endif

@endcomponent


@component('mail::panel')
       **BANKING DETAILS**
@endcomponent
@component('mail::table')
|                |    |
| -------------  | --------:|
| **Bank Name**  | {{$application->bankingDetails->bank_name }}   |
| **Branch Name**  | {{$application->bankingDetails->branch_name }}   |
| **Branch Code**  | {{$application->bankingDetails->branch_code }}   |
| **Account Number**  | {{$application->bankingDetails->account_number }}   |
| **Account Holder Names**  | {{$application->bankingDetails->account_name }}   |
| **Account Type**  | {{$application->bankingDetails->account_type }}   |
@endcomponent



@component('mail::button', ['url' => ''])
Approve Application
@endcomponent
@endcomponent

