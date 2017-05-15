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
            <blockquote>
                <p>
                    Lower Thetsane 
                </p>
                <small>  From next to the main road through to Mr. Matekane Residential Mansion</small>
            </blockquote>
            <blockquote>
                <p>
                    Thetsane West <br>
                </p>
            </blockquote>
            <blockquote>
                <p>
                    Thetsane East
                </p>
            </blockquote>
            <blockquote>
                <p>
                    Maseru West
                </p>
                <small>All the way through to Partners in Health Lesotho Headquarters</small>
            </blockquote>
            <blockquote>
                <p>
                   Stationary area 
                </p>
                <small>Lesotho Times offices and surrounding suburban homes</small>
            </blockquote>
            <blockquote>
                <p>
                  Hills View 
                </p>
                <small>Entire suburb</small>
            </blockquote>
            <blockquote>
                <p>
                 New and Old Europa suburb areas 
                </p>
                <small>From Khali Motel to Arrival Centre suburb </small>
            </blockquote>
            <blockquote>
                <p>
                 Golf Course Estates Area to Centre of Accounting Studies
                </p>
                <small>Through AVANI Maseru areas are also covered.</small>
            </blockquote>
        </div>
           </div>
       </div>
    </div>
</div>

 @endsection


