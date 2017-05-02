@extends('layouts.master')
@component('partials.inner-pages-banner')
@slot('title')
<h5>Surveys</h5>
@endslot

@endcomponent

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-body" >
                        <table class="table">
                            <thead>
                            <tr>
                                <th>Firstname</th>
                                <th>Lastname</th>
                                <th>Email</th>
                            </tr>
                            </thead>
                            <tbody>
                              @foreach($surveys as $survey)
                                  <tr>
                                      <td>{{$survey->name}}</td>
                                      <td>{{$survey->surname}}</td>
                                      <td>{{$survey->email}}</td>
                                  </tr>

                                  @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
