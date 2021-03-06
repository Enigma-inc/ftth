@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
             Econet Fibre  Location
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($ftthLocation, ['route' => ['ftthLocations.update', $ftthLocation->id], 'method' => 'patch','files'=>true]) !!}

                        @include('admin.ftth_locations.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection