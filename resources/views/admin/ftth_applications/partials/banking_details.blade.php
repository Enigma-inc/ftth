

  <div class="box-body">
               <div class="row">
                   {!! Form::model($ftthApplication, ['route' => ['ftthApplications.applicationbankingdetails','id'=>$ftthApplication->id], 'method' => 'patch']) !!}

                   {{-- Banking Details --}}
                    <!-- Bank Name  Field -->
                    <div class="form-group col-sm-6">
                        {!! Form::label('bankName', 'Bank Name:') !!}
                        {!! Form::text('bankName',$ftthApplication->banking?$ftthApplication->banking->bank_name:null, ['class' => 'form-control']) !!}
                    </div>


                    <!-- Branch Name Field -->
                    <div class="form-group col-sm-6">
                        {!! Form::label('branchName', 'Branch Name:') !!}
                        {!! Form::text('branchName', $ftthApplication->banking?$ftthApplication->banking->branch_name:null, ['class' => 'form-control']) !!}
                    </div>

                    <!-- Branch Code Field -->
                    <div class="form-group col-sm-6">
                        {!! Form::label('branchCode', 'Branch Code:') !!}
                        {!! Form::text('branchCode', $ftthApplication->banking?$ftthApplication->banking->branch_code:null, ['class' => 'form-control']) !!}
                    </div>

                    <!-- Account HolderName Field -->
                    <div class="form-group col-sm-6">
                        {!! Form::label('accountHolderName', 'Account Holder Name:') !!}
                        {!! Form::text('accountHolderName',$ftthApplication->banking?$ftthApplication->banking->account_name:null , ['class' => 'form-control']) !!}
                    </div>


                    <!-- AccountType Field -->
                    <div class="form-group col-sm-6">
                        {!! Form::label('accountType', 'Account Type:') !!}
                        {!! Form::text('accountType',$ftthApplication->banking?$ftthApplication->banking->account_type:null , ['class' => 'form-control']) !!}
                    </div>

                    <!-- AccountNumber Field -->
                    <div class="form-group col-sm-6">
                        {!! Form::label('accountNumber', 'Account Number:') !!}
                        {!! Form::text('accountNumber',$ftthApplication->banking?$ftthApplication->banking->account_number:null , ['class' => 'form-control']) !!}
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



 