<div style="overflow-x:auto;">
    <table class="table table-responsive" id="packagesLookups-table">
        <thead>
            <tr>
                <th>Data Bundle</th>
            <th>Price</th>
            <th>Type</th>
                <th class="text-right">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($packagesLookups as $packagesLookup)
            <tr>
                <td>{!! $packagesLookup->data_bundle !!}GB</td>
                <td> M{{number_format($packagesLookup->price, 2)}}</td>
                <td>{!! $packagesLookup->type !!}</td>
                <td>
                    {!! Form::open(['route' => ['packagesLookups.destroy', $packagesLookup->id], 'method' => 'delete']) !!}
                    <div class='btn-group pull-right'>
                        {{--  <a href="{!! route('packagesLookups.show', [$packagesLookup->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>  --}}
                        <a href="{!! route('packagesLookups.edit', [$packagesLookup->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>