@extends('layouts.master') 
@component('partials.inner-pages-banner')
    @slot('title')
        <img src="{{url('images/fiber2hme-logo.png?v=2')}}" alt="FTTH" height="200">
        <h2>Areas access to <strong> Econet Fibre </strong></h2>
    @endslot
 @endcomponent 

 @section('content')
<div class="container ftth-areas padding-top-20">
    <div class="row">
      <ftth-locations></ftth-locations>

    </div>
</div>

 @endsection


