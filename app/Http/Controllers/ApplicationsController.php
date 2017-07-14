<?php

namespace App\Http\Controllers;

use App\Application;
use Illuminate\Http\Request;
use \App\Http\Requests\ApplicationRequest;

class ApplicationsController extends Controller
{
  function __construct()
    {
        $this->middleware(['auth']);
    }

    public function create()
    {
        return view('application.create');
    }

    public function store(ApplicationRequest $request)
    {
        dd($request->toArray());

            $table->string('postal_address');
            $table->string('physical_address');
        $application=  Application::create([
            'name'=>request('name'),
            'surname'=>request('surname'),
            'email'=>request('email'),
            'phone_home'=>request('phoneHome'),
            'phone_office'=>request('phoneOffice'),
            'phone_mobile'=>request('phoneMobile'),
            'id_number'=>request('passport'),
            'existing_customer'=>true,
            'postal_address'=>request(),

           // 'location_id'=>request('location')
        ]);

       // $locationName=Location::find(request('location'))->name;
        $request->session()->flash('flash',"Thank you, we have received your application for FTTH we will get back to you" );
        return  $application;
    }

    public function show(Application $application)
    {
        //
    }


    public function edit(Application $application)
    {
        //
    }


    public function update(Request $request, Application $application)
    {
        //
    }


    public function destroy(Application $application)
    {
        //
    }
}
