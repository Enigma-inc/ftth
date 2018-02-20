@extends('layouts.app')  

 @section('content')
<div class="container">
    <div class="row">
        <button class="btn btn-danger pull-right" data-toggle="modal" data-target="#myModal">Add Location</button>
        <div id="myModal" class="modal fade" role="dialog">
                    <div class="modal-dialog">

                        <!-- Modal content--> 
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Add Location</h4>
                        </div>
                        <div class="modal-body">
                            <form class="form-horizontal" role="form" method="POST" action="{{route('location.store')}}">
                                {{ csrf_field() }}

                                <div class="col-xs-12 col-md-6">
                                    <div class="form-group label-floating padding-right-10 {{ $errors->has('name') ? ' has-error' : '' }}">
                                        <label for="name" class=" control-label">Name</label>

                                        <div class="">
                                            <input required id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" autofocus> 
                                            @if ($errors->has('name'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('name') }}</strong>
                                                </span> 
                                            @endif
                                        </div>
                                    </div> 
                                </div> 
                                <div class="modal-footer-ftth">
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>                                  
                                    </div>
                                </div>
                            </form>                                                                 
                        </div>
                    </div>
                </div>
            </div>
        <div class="panel panel-primary">
            <div class="panel-heading">List Of Locations</div>

            <div class="panel-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <td>Location</td>
                            <td>Action</td>  
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($locations as $location)
                            <tr>
                                <td>
                                    {{ $location->name }}
                                </td>
                                <td>
                                    <div class="col-xs-12 button-flex">
                                        <a href="{{route('location.edit',$location->id)}}" class="btn btn-info btn-xs margin-right-5"><i class="fa fa-edit"></i> Edit</a>
                                        <form action="{{route('location.destroy',['id'=>$location->id])}}" method="POST">
                                            {{csrf_field()}}
                                            <input type="text" name="file-name"class="" value="{{$location->id}}" hidden>
                                            <button type="submit" class="btn btn-danger btn-xs margin-right-5"><i class="fa fa-trash-o"></i> Remove</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>   
                <div class="row text-center">
                    {{ $locations->links() }}
                </div>         
            </div>
        </div>
    </div>
</div>

 @endsection