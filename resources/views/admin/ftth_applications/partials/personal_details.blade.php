

  <div class="box-body">
               <div class="row">
                   {!! Form::model($ftthApplication, ['route' => ['ftthApplications.mainapplication', 'id'=>$ftthApplication->id], 'method' => 'patch']) !!}
                   
<h4 class="form-group col-sm-12" style="color:#0d6aa1;">Personal Details </h4>

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
<div class="form-group col-sm-6">
    {!! Form::label('postal_address', 'Postal Address:') !!}
    {!! Form::text('postal_address', null, ['class' => 'form-control']) !!}
</div>

<!-- Service Field -->
<div class="form-group col-sm-6">
     <div>
      {!! Form::label('location_id', 'Location:') !!}
     </div>

     <div>
        <select id='location_select'  style="width: 100%;" name="location_id" class="form-control">
        @foreach($locations as $location)
        <option  id="service-{{$location->id}}" value="{!!$location->id!!}">{!!$location->name !!}</option>
        @endforeach
        </select>
     </div>
</div>


{{-- Status --}}

<h4 class="form-group col-sm-12" style="color:#0d6aa1;">Status </h4>
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
<div class="form-group col-sm-12  ">
    <div class="pull-right">
        {!! Form::submit('Save', ['class' => 'btn btn-primary ']) !!}
        <a href="{!! route('ftthApplications.index') !!}" class="btn btn-default">Cancel</a>
    </div>
</div>


     {!! Form::close() !!}
             </div>
 </div>



 