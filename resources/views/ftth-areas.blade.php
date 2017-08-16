@extends('layouts.master') 
@component('partials.inner-pages-banner')
    @slot('title')
        <img src="{{url('images/fiber2hme-logo.png')}}" alt="FTTH" height="200">
        <h2>Areas with <strong>FTTH</strong></h2>
    @endslot
 @endcomponent 

 @section('content')
<div class="container ftth-areas">
    <div class="row">
       <div class="panel panel-primary margin-top-20">
       <div class="panel-heading">
       <div>Apply For FTTH</div>
       <div>
        <a href="{{route('application.create')}}" class="btn btn-danger btn-xs">Apply</a>
       </div>
       </div>
           <div class="panel-body">
          <div class="col-xs-12 ">
           <ftth-locations></ftth-locations>
           </div>
           </div>
       </div>
    </div>
</div>

 @endsection


