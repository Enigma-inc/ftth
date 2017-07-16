@extends('layouts.master') @component('partials.inner-pages-banner') @slot('title')
<img src="{{url('images/fiber2hme-logo.png')}}" alt="FTTH" height="200">
<h2>Apply For <strong>FTTH</strong></h2>
@endslot 
@endcomponent

 @section('content')
<application inline-template>
    <div class="container">
        <div class="row">
            <div class="col-xs-12 ">
            <form-wizard
                next-button-text="Next Step"
                 color="#0d47a1"
                 >
                    <tab-content title="Personal Details"
                    :before-change="submitStep">
                        @include('application.personal-details-form')
                    </tab-content>
                    <tab-content title="Service Type">
                        @include('application.service-type-details-form')
                    </tab-content>
                    <tab-content title="Banking Details">
                        @include('application.banking-details-form')
                    </tab-content>
            </form-wizard>
                
            </div>
        </div>
    </div>
</application>

@endsection