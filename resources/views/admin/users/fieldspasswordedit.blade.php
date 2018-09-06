           

            {{--  {!! csrf_field() !!}  --}}

            <div class="form-group col-sm-12 col-sm-12 has-feedback{{ $errors->has('name') ? ' has-error' : '' }}">
                <span type="text" class="form-control" style="text-transform:uppercase;" >{{$user->name}}</span>
                {{-- <span class="glyphicon glyphicon-user form-control-feedback"></span> --}}

                @if ($errors->has('name'))
                    <span class="help-block">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                @endif
            </div>

            <div class="form-group col-sm-12 has-feedback{{ $errors->has('password') ? ' has-error' : '' }}">
                <input type="password" class="form-control" name="password" placeholder="Password">
                {{-- <span class="glyphicon glyphicon-lock form-control-feedback"></span> --}}

                @if ($errors->has('password'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
            </div>

            <div class="form-group col-sm-12 has-feedback{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                <input type="password" name="password_confirmation" class="form-control" placeholder="Confirm password">
                {{-- <span class="glyphicon glyphicon-lock form-control-feedback"></span> --}}

                @if ($errors->has('password_confirmation'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                    </span>
                @endif
            </div>

            <div class="row form-group col-sm-12">
                <div class="col-xs-4">
                    <button type="submit" class="btn btn-primary btn-flat">Reset Password</button>
                </div>
            </div>


