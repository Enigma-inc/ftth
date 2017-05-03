
             <form class="form-horizontal" role="form" method="POST" action="{{route('create.request')}}">
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
                        <div class="col-xs-12 col-md-12">

                            <div class="form-group label-floating padding-right-10 {{ $errors->has('location') ? ' has-error' : '' }}">
                                <label for="location" class="control-label ">Select Your Location<span class="required-star">*</span></label>

                                <div class="">
                                    <select name="location" id="location_id" class="form-control ">
                                            @foreach($locations as $location)
                                                <option value="{{$location->id}}">{{$location->name}}</option>
                                            @endforeach
                                        </select> @if ($errors->has('location'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('location') }}</strong>
                                    </span> @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 text-center">

                            <div class="form-group label-floating padding-right-10">
                                <hr>
                                <button type="submit" class="btn btn-primary">Place Your Request</button>

                            </div>
                        </div>

                    </form>
