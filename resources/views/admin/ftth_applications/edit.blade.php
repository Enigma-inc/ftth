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
                   {!! Form::model($ftthApplication, ['route' => ['ftthApplications.update', $ftthApplication->id], 'method' => 'patch']) !!}

                        @include('admin.ftth_applications.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection