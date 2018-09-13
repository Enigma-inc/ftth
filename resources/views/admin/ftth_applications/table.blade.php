<div style="overflow-x:auto;">
    <table class="table table-responsive" id="ftthApplications-table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Surname</th>
                <th>Email</th>
                <th>Phone </th>
                <th>Location</th>
                <th>Service</th>
                <th>Complete </th>
                <th>Billing Agreed</th>
                <th>Inspected</th>
                <th>Approved</th>
                <th>Installed</th>
               <th class="text-right">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($ftthApplications as $ftthApplication)
        <tr>
            <td>{!! $ftthApplication->name !!}</td>
            <td>{!! $ftthApplication->surname !!}</td>
            <td>{!! $ftthApplication->email !!}</td>
            <td>{!! $ftthApplication->phone !!}</td>
            <td>{!! $ftthApplication->location->name !!}</td>
            <td>{!!$ftthApplication->serviceType->service_type !!}: {!!$ftthApplication->serviceType->data_package !!}</td>
            <td>{!! $ftthApplication->is_complete ?'YES':'NO'!!}</td>
            <td>{!!$ftthApplication->is_billing_agreed?'YES':'NO'!!}</td>
            <td>{!!$ftthApplication->is_inspected?'YES':'NO'!!}</td>
            <td>{!!$ftthApplication->is_approved?'YES':'NO'!!}</td>
            <td>{!!$ftthApplication->is_installed?'YES':'NO'!!}</td>
            <td>
                {!! Form::open(['route' => ['ftthApplications.destroy', $ftthApplication->id], 'method' => 'delete']) !!}
                <div class='btn-group pull-right '>
                    <a href="{!! route('ftthApplications.show', [$ftthApplication->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a> 
                    <a href="{!! route('ftthApplications.edit', [$ftthApplication->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
</div>

