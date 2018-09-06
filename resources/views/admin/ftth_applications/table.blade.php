<div style="overflow-x:auto;">
<table class="table table-responsive" id="ftthApplications-table">
    <thead>
        <tr>
            <th>Title</th>
        <th>Name</th>
        <th>Surname</th>
        <th>Email</th>
        <th>Phone Mobile</th>
        <th>Phone Home</th>
        <th>Phone Office</th>
        <th>Passport</th>
        <th>Postal Address</th>
        <th>Physical Address</th>
        <th>Location Id</th>
        <th>Banking Id</th>
        <th>Service Id</th>
            <th class="text-right">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($ftthApplications as $ftthApplication)
        <tr>
            <td>{!! $ftthApplication->title !!}</td>
            <td>{!! $ftthApplication->name !!}</td>
            <td>{!! $ftthApplication->surname !!}</td>
            <td>{!! $ftthApplication->email !!}</td>
            <td>{!! $ftthApplication->phone_mobile !!}</td>
            <td>{!! $ftthApplication->phone_home !!}</td>
            <td>{!! $ftthApplication->phone_office !!}</td>
            <td>{!! $ftthApplication->passport !!}</td>
            <td>{!! $ftthApplication->postal_address !!}</td>
            <td>{!! $ftthApplication->physical_address !!}</td>
            <td>{!! $ftthApplication->location_id !!}</td>
            <td>{!! $ftthApplication->applicant_banking_details_id !!}</td>
            <td>{!! $ftthApplication->applicant_service_type_id !!}</td>
            <td>
                {!! Form::open(['route' => ['ftthApplications.destroy', $ftthApplication->id], 'method' => 'delete']) !!}
                <div class='btn-group pull-right '>
                    {{--  <a href="{!! route('ftthApplications.show', [$ftthApplication->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>  --}}
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