@extends('layouts.app')

@section('content')

    <section class="content-header">
        <h1>
             Econet Fibre  Application
        </h1>
    </section>
  <div class="content">
          <div class="clearfix"></div>

         @include('flash::message')

         <div class="clearfix"></div>

         <div class="box box-primary">
                    <button class="accordion" ><h7>Personal details and Status </h7></button>
                     <div class="panel">                                 
                    <h3 class="form-group col-sm-12" style="color:#0d6aa1;">Personal Details </h3>

                     <div class="form-group col-sm-6" style="color:#0d6aa1;">
                        <label>Name:</label>
                        <span>{!! $ftthApplication->name !!} {!! $ftthApplication->surname !!}</span>
                    
                      </div>

                       <div class="form-group col-sm-6" style="color:#0d6aa1;">
                        <label>Email:</label>
                        <span>{!! $ftthApplication->email !!}</span>
                    
                       </div>

                         <div class="form-group col-sm-6" style="color:#0d6aa1;">
                        <label>Phone:</label>
                        <span>{!! $ftthApplication->phone!!}</span>
                    
                         </div>

                        <div class="form-group col-sm-6" style="color:#0d6aa1;">
                        <label>Identification:</label>
                        <span>{!! $ftthApplication->id_number?$ftthApplication->id_number:""!!}</span>
                    
                         </div>
                        
                         <div class="form-group col-sm-6" style="color:#0d6aa1;">
                        <label>Physical Adress:</label>
                        <span>{!! $ftthApplication->physical_address?$ftthApplication->physical_address:""!!}</span>
                    
                         </div>

                           
                         <div class="form-group col-sm-6" style="color:#0d6aa1;">
                        <label>Postal Address:</label>
                        <span>{!! $ftthApplication->postal_address?$ftthApplication->postal_address:""!!}</span>
                    
                         </div>

                           <div class="form-group col-sm-6" style="color:#0d6aa1;">
                        <label>Location:</label>
                        <span>{!! $ftthApplication->location->name!!}</span>
                    
                         </div>


                        <h3 class="form-group col-sm-12" style="color:#0d6aa1;">Status </h3>
                            <div class="form-group col-sm-6" style="color:#0d6aa1;" >
                              <label >Billing Agreed</label>
                            <div style="display: flex;">
                                @if($ftthApplication->is_billing_agreed)
                                <i class="fa fa-thumbs-up" style="font-size: 20px;padding-left: 10px"></i>
                                @else
                                <i class="fa fa-thumbs-down" style="font-size: 20px;padding-left: 10px"></i>
                                @endif
                                </div>
                            </div>


                            <div class="form-group col-sm-6" style="color:#0d6aa1;">
                                {!! Form::label('is_inspected',"Inspected") !!}
                            <div style="display: flex;">
                                @if($ftthApplication->is_inspected)
                                 <i class="fa fa-thumbs-up" style="font-size: 20px;padding-left: 10px"></i>
                                @else
                                <i class="fa fa-thumbs-down" style="font-size: 20px;padding-left: 10px"></i>
                                @endif
                                </div>
                                
                            </div>


                            <div class="form-group col-sm-6" style="color:#0d6aa1;">
                                {!! Form::label('is_complete',"Complete") !!}
                            <div style="display: flex;">
                                @if($ftthApplication->is_complete)
                                <i class="fa fa-thumbs-up" style="font-size: 20px;padding-left: 10px"></i>
                                @else
                                <i class="fa fa-thumbs-down" style="font-size: 20px;padding-left: 10px"></i>
                                @endif
                                </div>
                                
                            </div>


                            <div class="form-group col-sm-6" style="color:#0d6aa1;" >
                                {!! Form::label('is_installed',"Installed") !!}
                            <div style="display: flex;">
                                @if($ftthApplication->is_installed)
                              <i class="fa fa-thumbs-up" style="font-size: 20px;padding-left: 10px"></i>
                                @else
                                <i class="fa fa-thumbs-down" style="font-size: 20px;padding-left: 10px"></i>
                                @endif
                                </div>
                                
                            </div> 


                            <div class="form-group col-sm-6" style="color:#0d6aa1;">
                                {!! Form::label('is_approved',"Approved") !!}
                            <div style="display: flex;">
                                @if($ftthApplication->is_approved)
                                <i class="fa fa-thumbs-up" style="font-size: 20px;padding-left: 10px"></i>
                                @else
                                <i class="fa fa-thumbs-down" style="font-size: 20px;padding-left: 10px"></i>
                                @endif
                                </div>
                                
                            </div>


                        <div class="form-group col-sm-12  ">
                            <div class="pull-right">
                                <a href="{!! route('ftthApplications.index') !!}" class="btn btn-default">Cancel</a>
                                <a href="{!! route('ftthApplications.edit', [$ftthApplication->id]) !!}" class='btn btn-primary'>Edit </a>
                            </div>
                        </div>
                    
                    </div>
 
                  </div>

                <button class="accordion" >Service</button>
                <div class="panel">
                    
                    <!-- Service Field -->
                    <div class="form-group col-sm-12"  style="color:#0d6aa1;">
                        <div>
                        <label>Service</label>
                        </div>
                        <div>
                          <span>
                              {!! $ftthApplication->serviceType?$ftthApplication->serviceType->service_type:"" !!}:
                              {!! $ftthApplication->serviceType?$ftthApplication->serviceType->data_package:"" !!}</span>
                        </div>
                    </div>

                    <div class="form-group col-sm-6"  style="color:#0d6aa1;" >
                        {!! Form::label('is_adsl_customer',"Adsl Customer") !!}
                    <div style="display: flex;">
                        @if($ftthApplication->serviceType->is_adsl_customer)
                        <i class="fa fa-thumbs-up" style="font-size: 20px;padding-left: 10px"></i>
                                @else
                        <i class="fa fa-thumbs-down" style="font-size: 20px;padding-left: 10px"></i>
                                @endif
                      </div>

                        
                    </div>

                    <div class="form-group col-sm-6"  style="color:#0d6aa1;">
                        <label>Adsl Number</label>
                        <span>{!! $ftthApplication->serviceType?$ftthApplication->serviceType->adsl_number:"" !!}</span>
                    </div>

                     <div class="form-group col-sm-12  ">
                            <div class="pull-right">
                                <a href="{!! route('ftthApplications.index') !!}" class="btn btn-default">Cancel</a>
                                <a href="{!! route('ftthApplications.edit', [$ftthApplication->id]) !!}" class='btn btn-primary'>Edit </a>
                            </div>
                   </div>


            </div>

                <button class="accordion" >Payment Details</button>
                <div class="panel">
                    <!-- Bank Name  Field -->
                    <div class="form-group col-sm-6" style="color:#0d6aa1;">
                        {!! Form::label('bankName', 'Bank Name:') !!}
                    <span>{!! $ftthApplication->banking?$ftthApplication->banking->bank_name:""!!}</span>
                    </div>


                    <!-- Branch Name Field -->
                    <div class="form-group col-sm-6" style="color:#0d6aa1;">
                        {!! Form::label('branchName', 'Branch Name:') !!}
                  <span>{!! $ftthApplication->banking?$ftthApplication->banking->branch_name:""!!}</span>
                    </div>

                    <!-- Branch Code Field -->
                    <div class="form-group col-sm-6" style="color:#0d6aa1;">
                        {!! Form::label('branchCode', 'Branch Code:') !!}
                     <span>{!! $ftthApplication->banking?$ftthApplication->banking->branch_code:""!!}</span>
                    </div>

                    <!-- Account HolderName Field -->
                    <div class="form-group col-sm-6" style="color:#0d6aa1;">
                        {!! Form::label('accountHolderName', 'Account Holder Name:') !!}
                        <span>{!!$ftthApplication->banking?$ftthApplication->banking->account_name:""!!}</span>
                    </div>


                    <!-- AccountType Field -->
                    <div class="form-group col-sm-6" style="color:#0d6aa1;">
                        {!! Form::label('accountType', 'Account Type:') !!}
                      <span>{!! $ftthApplication->banking?$ftthApplication->banking->account_type:""!!}</span>
                    </div>

                    <!-- AccountNumber Field -->
                    <div class="form-group col-sm-6" style="color:#0d6aa1;">
                        {!! Form::label('accountNumber', 'Account Number:') !!}
                       <span>{!! $ftthApplication->banking?$ftthApplication->banking->account_number:""!!}</span>
                    </div> 
                    
                     <div class="form-group col-sm-12  ">
                            <div class="pull-right">
                                <a href="{!! route('ftthApplications.index') !!}" class="btn btn-default">Cancel</a>
                                <a href="{!! route('ftthApplications.edit', [$ftthApplication->id]) !!}" class='btn btn-primary'>Edit </a>
                            </div>
                        </div>
                        
                </div>

            </div>
 </div>

@endsection
@section('page-script')
<script type="text/javascript">

    var acc = document.getElementsByClassName("accordion");
var i;

for (i = 0; i < acc.length; i++) {
  acc[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var panel = this.nextElementSibling;
    if (panel.style.maxHeight){
      panel.style.maxHeight = null;
    } else {
      panel.style.maxHeight = panel.scrollHeight + "px";
    } 
  });
}
 </script>

@endsection
