@extends('layouts.app')  

 @section('content')
<div class="container">
    <div class="row">
        <a href="{{route('ftthLocations.create')}}" class="btn btn-danger btn-xs pull-right">Add Location</a>    
        <div class="panel panel-primary">
            <div class="panel-heading">List Of Ftth Locations</div>

            <div class="panel-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <td>Ftth Location</td>
                            <td>Action</td>  
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($ftthLocations as $ftthLocation)
                            <tr>
                                <td>
                                    {{ $ftthLocation->name }}
                                </td>
                                <td>
                                    <div class="col-xs-12 button-flex">
                                        <a href="{{route('ftthLocations.edit',$ftthLocation->id)}}" class="btn btn-info btn-xs margin-right-5"><i class="fa fa-edit"></i> Edit</a>
                                        <form action="{{route('ftthLocations.destroy',['id'=>$ftthLocation->id])}}" method="POST">
                                            {{csrf_field()}}
                                            <input type="text" name="file-name"class="" value="{{$ftthLocation->id}}" hidden>
                                            <button type="submit" class="btn btn-danger btn-xs margin-right-5"><i class="fa fa-trash-o"></i> Remove</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>   
                <div class="row text-center">
                    {{ $ftthLocations->links() }}
                </div>         
            </div>
        </div>
    </div>
</div>

 @endsection