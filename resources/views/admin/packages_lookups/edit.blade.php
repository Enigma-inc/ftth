@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Packages Lookup
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($packagesLookup, ['route' => ['packagesLookups.update', $packagesLookup->id], 'method' => 'patch']) !!}

                        @include('admin.packages_lookups.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection