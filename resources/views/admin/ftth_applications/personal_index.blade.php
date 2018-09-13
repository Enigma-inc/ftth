@extends('layouts.app')

@section('content')
    <section class="content-header" style="    width: 98%;padding-left: 40px;">
        <h1 class="pull-left"> Your Applications</h1>
        <h1 class="pull-right">
            <a class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px" href="{!! route('ftthApplications.create') !!}">Add New</a>
        </h1>
    </section>
    <div class="content">
        <div class="clearfix"></div>
        
        @include('flash::message')

        <div class="clearfix"></div>
        <div style="position: relative;border-radius: 3px;">
            <div class="box-body">
                    @foreach($ftthApplications as $ftthApplication)
                        <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
                            <div class="w3-card-4" >
                                <div>
                                    <header class="w3-container w3-light-grey">
                                    <h3 class="card_header">{!!ucfirst($ftthApplication->name)!!} {!! ucfirst($ftthApplication->surname) !!}</h3>
                                    </header>
                                </div>
                            <div class="w3-container">
                                 <div class="form-group col-sm-12" style="color:#0d6aa1;">
                                     <label>Email:</label>
                                      <span>{!! $ftthApplication->email !!}</span>
                                  </div>
                                <div class="form-group col-sm-12" style="color:#0d6aa1;">
                                     <label>Phone:</label>
                                         <span>{!! $ftthApplication->phone!!}</span>
                                  </div>
                               <div class="form-group col-sm-12"  style="color:#0d6aa1;">
                                <label>Service:</label>
                                <span>
                                    {!! ucfirst($ftthApplication->serviceType?$ftthApplication->serviceType->service_type:"") !!}-
                                    {!! $ftthApplication->serviceType?$ftthApplication->serviceType->data_package:"" !!}</span>
                                </div>

                                 <div class="form-group col-sm-12" style="color:#0d6aa1;">
                                  <label>Location:</label>
                                     <span>{!! ucfirst($ftthApplication->location->name)!!}</span>
                    
                                   </div>
                           
                           
                            </div>
                             <div class="w3-button w3-block w3-dark-grey">
                                {!! Form::open(['route' => ['ftthApplications.destroy', $ftthApplication->id], 'method' => 'delete']) !!}
                                        <div class='btn-group pull-right card-button_actions '>
                                            <a   href="{!! route('ftthApplications.show', [$ftthApplication->id]) !!}" class='btn btn-default single_card_button'><i class="glyphicon glyphicon-eye-open"></i></a> 
                                            <a   href="{!! route('ftthApplications.edit', [$ftthApplication->id]) !!}" class='btn btn-default single_card_button'><i class="glyphicon glyphicon-edit"></i></a>
                                            {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger single_card_button', 'onclick' => "return confirm('Are you sure?')"]) !!}
                                        </div>
                                {!! Form::close() !!}
                            </div>
                        
                            </div>
                        </div>
                        @endforeach
            </div>
        </div>
        <div class="text-center">
        
        </div>
    </div>
@endsection
@section('page-script')
<script type="text/javascript">

 </script>
@endsection

