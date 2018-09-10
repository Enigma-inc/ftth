<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Email Field -->
<div class="form-group col-sm-6">
    {!! Form::label('email', 'Email:') !!}
    {!! Form::email('email', null, ['class' => 'form-control']) !!}
</div>

<!-- Password Field -->
<div hidden class="form-group col-sm-6">
    {!! Form::label('password', 'Password:') !!}
    {!! Form::text('password', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group col-sm-12" >
    {!! Form::label('is_admin','Admin:') !!}
   <div style="display: flex;">
    @if($user->is_admin)
       <input id="is_admin-checkbox" style="margin-left:10px;" type="checkbox" name="is_admin" checked ><br>
       @else
      <input id="is_admin-checkbox" style="margin-left:10px;" type="checkbox" name="is_admin" ><br>
    @endif
   </div>
  
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('users.index') !!}" class="btn btn-default">Cancel</a>
</div>
