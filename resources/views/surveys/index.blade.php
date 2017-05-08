@extends('layouts.master') 
@component('partials.inner-pages-banner')
 @slot('title')
      <img src="{{url('images/fiber2hme-logo.png')}}" alt="FTTH" height="200">
    <h2> <strong>FTTH</strong> Requests</h2>
@endslot
 @endcomponent 



@section('content')
    <div class="">
        <div class="row ftth-requests">
            <div class="col-xs-12 ">
                <div class="panel panel-default margin-top-20">
                    <div class="panel-body" >
                    <div class="row action-bar">
                       <div class="flex"><span class="label label-danger margin-top-10 margin-left-20">{{$surveys->total()}} Requests</span></div>
                            <div class="margin-right-40">
                            <div class="col-md-3 dropdown">
                                <a href="#" class="btn  btn-primary btn-xs  dropdown-toggle" data-toggle="dropdown">
                                   Export
                                    <b class="caret"></b>
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a href="{{route('export.excel',["type"=>"xls"])}}">Excel</a></li>
                                    <li><a href="{{route('export.excel',["type"=>"pdf"])}}">PDF</a></li>
                                    
                                </ul>
                            </div>
                       </div>
                    </div>
                        <div class="table-responsive">
                        <table class="table table-condensed">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Surname</th>
                                <th>Email</th>
                                <th>Mobile</th>
                                <th>Home</th>                                
                                <th>Work</th>
                                <th>Requested For</th>
                                <th>Requested On</th>
                            </tr>
                            </thead>
                            <tbody>
                              @foreach($surveys as $index => $survey)
                                  <tr>
                                      <td>{{(($surveys->currentPage()-1)* $surveys->perPage())+$index +1}}</td>                                  
                                      <td>{{$survey->name}}</td>
                                      <td>{{$survey->surname}}</td>
                                      <td>{{$survey->email}}</td>
                                      <td>{{$survey->phone_mobile}}</td>
                                      <td>{{$survey->phone_home}}</td>                                      
                                      <td>{{$survey->phone_office}}</td>
                                      <td><span class="{{ $survey->type =='Business' ? 'color-primary' : 'color-danger' }}">{{$survey->type}}</span> </td>
                                      <td>{{$survey->created_at->diffForHumans()}}</td>
                                  </tr>

                                  @endforeach
                            </tbody>
                        </table> </div>
                        <div class="col-xs-12 text-center">
                        {{$surveys->links()}}
                        
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
