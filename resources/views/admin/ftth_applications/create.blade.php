@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Econet Fibre  Application
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">

            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'ftthApplications.store']) !!}

                        @include('admin.ftth_applications.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection

@section('page-script')
<script type="text/javascript">

$(document).ready(function(){

        var applicant_service_type_select=$('#applicant_service_type_select').select2();
        var location_select=$('#location_select').select2();

    })
 </script>
@endsection
