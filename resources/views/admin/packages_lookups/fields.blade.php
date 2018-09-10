<!-- Data Bundle Field -->
<div class="form-group col-sm-6">
    {!! Form::label('data_bundle', 'Data Bundle:') !!}
    {!! Form::text('data_bundle', null, ['class' => 'form-control']) !!}
</div>

<!-- Price Field -->
<div class="form-group col-sm-6">
    {!! Form::label('price', 'Price:') !!}
    {!! Form::number('price', null, ['class' => 'form-control','step'=>'.01']) !!}
</div>

<div class="form-group col-sm-12">
    {!! Form::label('type', 'Type:') !!}
    <select class="form-control" name="type">
        <option>Prepaid</option>
        <option>Contract</option>
    </select>
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('packagesLookups.index') !!}" class="btn btn-default">Cancel</a>
</div>
