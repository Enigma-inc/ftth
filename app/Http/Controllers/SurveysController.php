<?php

namespace App\Http\Controllers;

use App\Http\Requests\SurveyRequest;
use App\Survey;
use Illuminate\Http\Request;

class SurveysController extends Controller
{
    function __construct()
    {
        $this->middleware(['auth'])->except(['create','store']);
    }

    public function index()
    {
        $surveys=Survey::all();
        return view('surveys.index',compact('surveys'));
    }


    public function create()
    {
        return view('surveys.create');
    }


    public function store(SurveyRequest $request)
    {
      $survey=  Survey::create([
            'name'=>request('name'),
            'surname'=>request('surname'),
            'email'=>request('email'),
            'phone_home'=>request('phone-home'),
            'phone_office'=>request('phone-office'),
            'phone_mobile'=>request('phone-mobile'),
            'location_id'=>1
        ]);
     
        return back();

    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }
}
