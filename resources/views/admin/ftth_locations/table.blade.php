<div style="overflow-x:auto;">
<table class="table table-responsive" id="ftthLocations-table">
    <thead>
        <tr>
        <th>Image</th>
        <th>Name</th>
        <th>Description</th>
            <th class="text-right">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($ftthLocations as $ftthLocation)
        <tr>
           
            <td>
                  @if($ftthLocation->image)
                 <img class="responsive locations-thumbnail margin-bottom-0" src="{{ Storage::Url($ftthLocation->image)}}"></td> 
                  @endif
            <td>{!! $ftthLocation->name !!}</td>
            <td>{!! $ftthLocation->description !!}</td>
            <td>
                {!! Form::open(['route' => ['ftthLocations.destroy', $ftthLocation->id], 'method' => 'delete']) !!}
                <div class='btn-group pull-right'>
                    {{--  <a href="{!! route('ftthLocations.show', [$ftthLocation->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>  --}}
                    <a href="{!! route('ftthLocations.edit', [$ftthLocation->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
</div>