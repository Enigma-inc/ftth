@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h5>Request <strong>Econet Fiber To Home</strong> In Your Area</h5>
                    </div>
                    <div class="panel-body">
                        <form class="form-horizontal" role="form" method="POST" action="/surveys">
                            {{ csrf_field() }}
                            <div class="text-danger text-center" style="padding:5px">
                              <h4>There are errors on the page, please fix them and continue</h4>
                                <hr>
                            </div>
                            <div class="form-group">
                                <label for="name" class="col-md-4 control-label">Name</label>
                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control" name="name" value="{{old('name')}}"  autofocus>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="surname" class="col-md-4 control-label">Surname</label>
                                <div class="col-md-6">
                                    <input id="surname" type="text" class="form-control" name="surname" value="{{old('surname')}}" >
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="phone-mobile" class="col-md-4 control-label">Cell Phone</label>
                                <div class="col-md-6">
                                    <input id="phone-mobile" type="text" class="form-control" name="phone-mobile"  value="{{old('phone-mobile')}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="phone-home" class="col-md-4 control-label">Home Phone</label>
                                <div class="col-md-6">
                                    <input id="phone-home" type="text" class="form-control" name="phone-home" value="{{old('phone-home')}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="phone-office" class="col-md-4 control-label">Office Phone</label>
                                <div class="col-md-6">
                                    <input id="phone-office" type="text" class="form-control" name="phone-office" value="{{old('phone-office')}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="email" class="col-md-4 control-label">Email Address</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control" name="email" value="{{old('email')}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-offset-4 col-md-6">
                                <button type="submit" class="btn btn-primary">Place Your Request</button>
                                </div>

                            </div>
                        </form>
                        @if(count($errors))
                            <ul class="alert alert-danger">
                                @foreach($errors->all() as $error)
                                    <li> {{$error}}</li>
                                @endforeach
                            </ul>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
