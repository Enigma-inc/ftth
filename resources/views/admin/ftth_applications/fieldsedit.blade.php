

{{-- Personal details --}}
<h4 class="form-group col-sm-12">Personal details </h4>
<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>
<!-- Surname Field -->
<div class="form-group col-sm-6">
    {!! Form::label('surname', 'Surname:') !!}
    {!! Form::text('surname', null, ['class' => 'form-control']) !!}
</div>
<!-- Email Field -->
<div class="form-group col-sm-6">
    {!! Form::label('email', 'Email:') !!}
    {!! Form::email('email', null, ['class' => 'form-control']) !!}
</div>
<!-- Phone Field -->
<div class="form-group col-sm-6">
    {!! Form::label('phone', 'Phone:') !!}
    {!! Form::text('phone', null, ['class' => 'form-control']) !!}
</div>
<!-- ID Number Field -->
<div class="form-group col-sm-6">
    {!! Form::label('id_number', 'ID Number:') !!}
    {!! Form::text('id_number', null, ['class' => 'form-control']) !!}
</div>
<!-- Physical Address Field -->
<div class="form-group col-sm-6">
    {!! Form::label('physical_address', 'Physical Address:') !!}
    {!! Form::text('physical_address', null, ['class' => 'form-control']) !!}
</div>
<!-- Postal Address Field -->
<div class="form-group col-sm-12">
    {!! Form::label('postal_address', 'Postal Address:') !!}
    {!! Form::text('postal_address', null, ['class' => 'form-control']) !!}
</div>



{{-- locaction and service --}}
<h4 class="form-group col-sm-12">Locaction and Service </h4>

<!-- Service Field -->
<div class="form-group col-sm-6">
     <div>
      {!! Form::label('applicant_service_type_id', 'Service:') !!}
     </div>

     <div>
        <select id='applicant_service_type_select'  style="width: 100%;" name="applicant_service_type_id">
        @foreach($services as $service)
        <option  id="service-{{$service->id}}" value="{!!$service->id!!}" >{!!$service->service_type !!}: {!!$service->data_package !!}</option>
        @endforeach
        </select>
     </div>
</div>


<!-- Service Field -->
<div class="form-group col-sm-6">
     <div>
      {!! Form::label('location_id', 'Location:') !!}
     </div>

     <div>
        <select id='location_select'  style="width: 100%;" name="location_id">
        @foreach($locations as $location)
        <option  id="service-{{$location->id}}" value="{!!$location->id!!}">{!!$location->name !!}</option>
        @endforeach
        </select>
     </div>
</div>



{{-- Banking Details --}}

<h4 class="form-group col-sm-12">Banking Details </h4>
<!-- Bank Name  Field -->
<div class="form-group col-sm-6">
    {!! Form::label('bankName', 'Bank Name:') !!}
    {!! Form::text('bankName', null, ['class' => 'form-control']) !!}
</div>


<!-- Branch Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('branchName', 'Branch Name:') !!}
    {!! Form::text('branchName', null, ['class' => 'form-control']) !!}
</div>

<!-- Branch Code Field -->
<div class="form-group col-sm-6">
    {!! Form::label('branchCode', 'Branch Code:') !!}
    {!! Form::text('branchCode', null, ['class' => 'form-control']) !!}
</div>

<!-- Account HolderName Field -->
<div class="form-group col-sm-6">
    {!! Form::label('accountHolderName', 'Account Holder Name:') !!}
    {!! Form::text('accountHolderName', null, ['class' => 'form-control']) !!}
</div>


<!-- AccountType Field -->
<div class="form-group col-sm-6">
    {!! Form::label('accountType', 'Account Type:') !!}
    {!! Form::text('accountType', null, ['class' => 'form-control']) !!}
</div>

<!-- AccountNumber Field -->
<div class="form-group col-sm-6">
    {!! Form::label('accountNumber', 'Account Number:') !!}
    {!! Form::text('accountNumber', null, ['class' => 'form-control']) !!}
</div>



{{-- Status --}}

<h4 class="form-group col-sm-12">Status </h4>
<div class="form-group col-sm-3" >
    {!! Form::label('is_billing_agreed',"Billing Agreed") !!}
   <div style="display: flex;">
       @if($ftthApplication->is_billing_agreed)
       <input id="is_billing_agreed-checkbox" style="margin-left:10px;" type="checkbox" name="is_billing_agreed" checked ><br>
       @else
       <input id="is_billing_agreed-checkbox" style="margin-left:10px;" type="checkbox" name="is_billing_agreed" ><br>
       @endif
    </div>
    
</div>


<div class="form-group col-sm-3" >
    {!! Form::label('is_inspected',"Inspected") !!}
   <div style="display: flex;">
       @if($ftthApplication->is_inspected)
       <input id="is_inspected-checkbox" style="margin-left:10px;" type="checkbox" name="is_inspected" checked ><br>
       @else
       <input id="is_inspected-checkbox" style="margin-left:10px;" type="checkbox" name="is_inspected" ><br>
       @endif
    </div>
    
</div>


<div class="form-group col-sm-3" >
    {!! Form::label('is_complete',"Complete") !!}
   <div style="display: flex;">
       @if($ftthApplication->is_complete)
       <input id="is_complete-checkbox" style="margin-left:10px;" type="checkbox" name="is_complete" checked ><br>
       @else
       <input id="is_complete-checkbox" style="margin-left:10px;" type="checkbox" name="is_complete" ><br>
       @endif
    </div>
    
</div>


<div class="form-group col-sm-3" >
    {!! Form::label('is_installed',"Installed") !!}
   <div style="display: flex;">
       @if($ftthApplication->is_installed)
       <input id="is_installed-checkbox" style="margin-left:10px;" type="checkbox" name="is_installed" checked ><br>
       @else
       <input id="is_installed-checkbox" style="margin-left:10px;" type="checkbox" name="is_installed" ><br>
       @endif
    </div>
    
</div>


<div class="form-group col-sm-3" >
    {!! Form::label('is_approved',"Approved") !!}
   <div style="display: flex;">
       @if($ftthApplication->is_approved)
       <input id="is_approved-checkbox" style="margin-left:10px;" type="checkbox" name="is_approved" checked ><br>
       @else
       <input id="is_approved-checkbox" style="margin-left:10px;" type="checkbox" name="is_approved" ><br>
       @endif
    </div>
    
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('ftthApplications.index') !!}" class="btn btn-default">Cancel</a>
</div>
