@extends('layouts.master') @component('partials.inner-pages-banner') @slot('title')
<img src="{{url('images/fiber2hme-logo.png')}}" alt="FTTH" height="200">
<h2>Apply For <strong>FTTH</strong></h2>
@endslot 
@endcomponent

 @section('content')
 <notifications></notifications>
<application inline-template>
    <div class="container">
        <div class="row">
            <div class="col-xs-12 ">
                <div  >
                    {{ csrf_field() }}
                    <div id="accordion" class="panel-group">
                        <div class="panel panel-primary" v-if="currentStep==1">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" class="collapsed" data-parent="#accordion" href="#personal-details">1. Personal Details</a>
                                </h4>
                            </div>
                            <div id="personal-details" class="panel-collapse collapse in">
                                <div class="panel-body">
                                    @include('application.personal-details-form')
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-primary" v-if="currentStep==2">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">2. Service Type</a>
                                </h4>
                            </div>
                            <div id="collapseTwo" class="panel-collapse collapse in">
                                <div class="panel-body">
                                @include('application.service-type-details-form')
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-primary" v-if="currentStep==3">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree">3. Payment Details</a>
                                </h4>
                            </div>
                            <div id="collapseThree" class="panel-collapse">
                                <div class="panel-body">
                                    @include('application.banking-details-form')
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</application>

@endsection