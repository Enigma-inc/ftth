@extends('layouts.app')  

 @section('content')
<div class="container">
    <div class="row">
        <a class="btn btn-danger btn-xs pull-right"  href="/admin/ftth-locations/create">Add Location</a>
        <div id="myModal" class="modal fade" role="dialog">
                    <div class="modal-dialog">

                        <!-- Modal content--> 
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Add Location</h4>
                        </div>
                        <div class="modal-body">
                            <form class="form-horizontal" role="form" method="POST" action="{{route('ftthLocation.store')}}">
                                {{ csrf_field() }}

                                <div class="col-xs-12 col-md-12">
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

                                    <div class="form-group label-floating padding-right-10 {{ $errors->has('description') ? ' has-error' : '' }}">
                                        <label for="description" class=" control-label">Description</label>

                                        <div class="">
                                            <textarea required id="description" type="text" class="form-control" name="description" value="{{ old('description') }}"></textarea>
                                            @if ($errors->has('description'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('description') }}</strong>
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
            <div class="panel-heading">Areas with access to Econet Fibre  </div>

            <div class="panel-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <td>
                                Location
                            </td>
                            <td>
                                Description
                            </td>
                            <td>
                                Action
                            </td>  
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($ftthLocations as $ftthLocation)
                            <tr>
                                <td>
                                    {{ $ftthLocation->name }}
                                </td>
                                <td>    
                                    {{ $ftthLocation->description }}
                                </td>
                                <td>
                                    <div class="col-xs-12 button-flex">
                                        <a href="{{route('ftthLocation.edit',$ftthLocation->id)}}" class="btn btn-info btn-xs margin-right-5"><i class="material-icons icon-size">edit</i> Edit</a>
                                        <form action="{{route('ftthLocation.destroy',['id'=>$ftthLocation->id])}}" method="POST">
                                            {{csrf_field()}}
                                            <input type="text" name="file-name"class="" value="{{$ftthLocation->id}}" hidden>
                                            <button type="submit" class="btn btn-danger btn-xs margin-right-5"><i class="material-icons icon-size">delete_forever</i> Remove</button>
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