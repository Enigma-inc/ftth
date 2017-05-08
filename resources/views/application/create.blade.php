@extends('layouts.master') 
@component('partials.inner-pages-banner')
 @slot('title')
      <img src="{{url('images/fiber2hme-logo.png')}}" alt="FTTH" height="200">
    <h2>Appliy For <strong>FTTH</strong></h2>
@endslot
 @endcomponent 

@section('content')
<application inline-template>
    <div class="container">
       <div class="row">
        <div class="col-xs-12 ">
        
        <div id="accordion" class="panel-group">
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h4 class="panel-title">
                <a data-toggle="collapse" data-parent="#accordion" href="#personal-details">1. Personal Details</a>
            </h4>
        </div>
        <div id="personal-details" class="panel-collapse collapse">
            <div class="panel-body">
                 @include('application.personal-details-form')               
            </div>
        </div>
    </div>
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h4 class="panel-title">
                <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">2. What is Bootstrap?</a>
            </h4>
        </div>
        <div id="collapseTwo" class="panel-collapse collapse in">
            <div class="panel-body">
                <p>Bootstrap is a powerful front-end framework for faster and easier web development. It is a collection of CSS and HTML conventions. <a href="http://www.tutorialrepublic.com/twitter-bootstrap-tutorial/" target="_blank">Learn more.</a></p>
            </div>
        </div>
    </div>
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h4 class="panel-title">
                <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree">3. What is CSS?</a>
            </h4>
        </div>
        <div id="collapseThree" class="panel-collapse collapse">
            <div class="panel-body">
                <p>CSS stands for Cascading Style Sheet. CSS allows you to specify various style properties for a given HTML element such as colors, backgrounds, fonts etc. <a href="http://www.tutorialrepublic.com/css-tutorial/" target="_blank">Learn more.</a></p>
            </div>
        </div>
    </div>
</div>
            <div class="panel panel-primary margin-top-10">
            <div class="panel-heading ">Personal Details</div>
                <div class="panel-body">
                 

                </div>
            </div>
        </div>
    </div>
    </div>
</application>
    
@endsection
