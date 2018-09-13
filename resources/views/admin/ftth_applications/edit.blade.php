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
                     @include('admin.ftth_applications.partials.personal_details')
                </div>

                <button class="accordion" >Service</button>
                <div class="panel">
                    @include('admin.ftth_applications.partials.service_details')
                </div>

                <button class="accordion" >Payment Details</button>
                <div class="panel">
                    @include('admin.ftth_applications.partials.banking_details')
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

$(document).ready(function(){

        var applicant_service_type_select=$('#applicant_service_type_select').select2();
        applicant_service_type_select.val({!!$ftthApplication->applicant_service_type_id!!}).trigger("change");

        var location_select=$('#location_select').select2();
        location_select.val({!!$ftthApplication->location_id!!}).trigger("change"); 

    })
 </script>

@endsection