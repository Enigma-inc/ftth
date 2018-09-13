
<div class="box-body">
               <div class="row">
                   {!! Form::model($ftthApplication, ['route' => ['ftthApplications.applicationservice', 'id'=>$ftthApplication->id], 'method' => 'patch']) !!}

<!-- Service Field -->
<div class="form-group col-sm-6">
     <div>
      {!! Form::label('applicant_service_type_id', 'Service:') !!}
     </div>
     <div>
        <select id='applicant_service_type_select'  style="width: 100%;" name="applicant_service_type_id">
        @foreach($services as $service)
        <option  id="service-{{$service->id}}" value="{!!$service->id!!}" >{!!$service->data_package !!}({!!lcfirst($service->service_type) !!}){!!$service->price!!}</option>
        @endforeach
        </select>
     </div>
</div>


<div class="form-group col-sm-6">
    {!! Form::label('adsl_number', 'Adsl Number:') !!}
    {!! Form::text('adsl_number', $ftthApplication->serviceType?$ftthApplication->serviceType->adsl_number:null, ['class' => 'form-control']) !!}
</div>

<div class="form-group col-sm-3" >
    {!! Form::label('is_adsl_customer',"Adsl Customer") !!}
   <div style="display: flex;">
       @if($ftthApplication->serviceType->is_adsl_customer)
       <input id="is_adsl_customer-checkbox" style="margin-left:10px;" type="checkbox" name="is_adsl_customer" checked ><br>
       @else
       <input id="is_adsl_customer-checkbox" style="margin-left:10px;" type="checkbox" name="is_adsl_customer" ><br>
       @endif
    </div>
    
</div>









<!-- Submit Field -->
<div class="form-group col-sm-12  ">
    <div class="pull-right">
        {!! Form::submit('Save', ['class' => 'btn btn-primary ']) !!}
        <a href="{!! route('ftthApplications.index') !!}" class="btn btn-default">Cancel</a>
    </div>
</div>


     {!! Form::close() !!}
             </div>
 </div>



 