@extends('layouts.master') 
@component('partials.inner-pages-banner')
 @slot('title')
      <img src="{{url('images/fiber2hme-logo.png')}}" alt="FTTH" height="200">
    <h2>Request <strong>Econet Fibre </strong> For Your Area</h2>
@endslot
 @endcomponent 
 
 @section('content')

<div class="container">
    <div class="row">
        <div class="col-xs-12 ">
            <div class="panel panel-default margin-top-10">
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{route('store.request')}}">
                        {{ csrf_field() }}

                        <div class="col-xs-12 col-md-6 ">
                            <div class="form-group label-floating padding-right-10 {{ $errors->has('name') ? ' has-error' : '' }}">
                                <label for="name" class=" control-label">Name <span class="required-star">*</span></label>

                                <div class="">
                                    <input required id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" autofocus> @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span> @endif
                                </div>
                            </div>

                            <div class="form-group label-floating padding-right-10 {{ $errors->has('surname') ? ' has-error' : '' }}">
                                <label for="surname" class=" control-label">Surname<span class="required-star">*</span></label>

                                <div class="">
                                    <input id="surname" type="text" class="form-control" name="surname" value="{{ old('surname') }}" autofocus> @if ($errors->has('surname'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('surname') }}</strong>
                                    </span> @endif
                                </div>
                            </div>

                            <div class="form-group label-floating padding-right-10 {{ $errors->has('phone-mobile') ? ' has-error' : '' }}">
                                <label for="phone-mobile" class=" control-label">Cellphone<span class="required-star">*</span> </label>

                                <div class="">
                                    <input id="phone-mobile" type="text" class="form-control" name="phone-mobile" value="{{ old('phone-mobile') }}" autofocus> @if ($errors->has('phone-mobile'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('phone-mobile') }}</strong>
                                    </span> @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-md-6">
                            <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }} label-floating padding-right-10">
                            
                                <label for="email" class="control-label">Email<span class="required-star">*</span></label>

                                <div class="">
                                    <input id="email" type="text" class="form-control" name="email" value="{{ old('email') }}" autofocus> @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span> @endif
                                </div>
                            </div>
                            <div class="form-group label-floating padding-right-10 ">
                                <label for="phone-home" class=" control-label">Home Phone</label>
                                <div class="">
                                    <input id="phone-home" type="text" class="form-control" name="phone-home" value="{{old('phone-home')}}">
                                </div>
                            </div>
                            <div class="form-group label-floating padding-right-10">
                                <label for="phone-office" class=" control-label">Office Phone</label>
                                <div class="">
                                    <input id="phone-office" type="text" class="form-control" name="phone-office" value="{{old('phone-office')}}">
                                </div>
                            </div>


                        </div>
                        <div class="col-xs-12 col-md-6">

                            <div class="form-group label-floating padding-right-10 {{ $errors->has('location') ? ' has-error' : '' }}">
                                <label for="location" class="control-label ">Select Your Location<span class="required-star">*</span></label>

                                <div class="">
                                    <select name="location" id="location_id" class="form-control padding-left-10">
                                            @foreach($locations as $location)
                                                <option value="{{$location->id}}">{{$location->name}}</option>
                                            @endforeach
                                        </select>
                                         @if ($errors->has('location'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('location') }}</strong>
                                    </span> @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-md-6" style="display:none">

                            <div class="form-group label-floating padding-right-10 {{ $errors->has('district') ? ' has-error' : '' }}">
                                <label for="district" class="control-label ">Select District<span class="required-star">*</span></label>

                                <div class="">
                                    <select name="district" id="district_id" class="form-control padding-left-10">
                                            @foreach($districts as $district)
                                                <option value="{{$district->id}}">{{$district->name}}</option>
                                            @endforeach
                                        </select> @if ($errors->has('district'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('district') }}</strong>
                                    </span> @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-md-12">
                                   <div class="form-group label-floating padding-right-10 {{ $errors->has('type') ? ' has-error' : '' }}">
                               <p>Service requested for home or business?  </p>
                                    <label class="radio-inline">
                                    <input v-validate="'required'" type="radio" name="type"  value="Home">Home
                                    </label>
                                    <label class="radio-inline">
                                    <input v-validate="'required'" type="radio" name="type" value="Business">Business
                                    </label>
                                    <p>
                                      @if ($errors->has('type'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('type') }}</strong>
                                    </span> @endif
                                    </p>
                          </div>
                        </div>
                        <div class="col-xs-12 text-center">

                            <div class="form-group label-floating padding-right-10">
                                <hr>
                                <button type="submit" class="btn btn-primary">Place Your Request</button>

                            </div>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection