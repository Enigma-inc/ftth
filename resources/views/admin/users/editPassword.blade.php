@extends('layouts.app')

@section('content')

   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="box-header with-border">
                  <div>Edit Password</div>
                 </div>

               <div class="row">
                   {!! Form::model($user, ['route' => ['users.resetpassword', $user->id], 'method' => 'patch']) !!}

                        @include('admin.users.fieldspasswordedit')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection