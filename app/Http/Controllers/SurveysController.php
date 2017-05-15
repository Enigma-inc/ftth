<?php

namespace App\Http\Controllers;

use App\Http\Requests\SurveyRequest;
use App\Mail\RequestReceived;
use App\Survey;
use App\Location;
use App\District;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Maatwebsite\Excel\Facades\Excel;

class SurveysController extends Controller
{
    function __construct()
    {
        $this->middleware(['auth'])->except(['create','store','ftthAreas']);
    }

    public function index()
    {
        $surveys=Survey::latest()->paginate(15);
        return view('surveys.index')->with(['surveys'=>$surveys]);
    }


    public function create()
    {
        $locations= Location::orderBy('name', 'ASC')->get();
        $districts=District::all();
        return view('surveys.create')->with(['locations'=>$locations,'districts'=>$districts]);
    }


    public function store(SurveyRequest $request)
    {
      $survey =  Survey::create([
            'name'=>request('name'),
            'surname'=>request('surname'),
            'email'=>request('email'),
            'phone_home'=>request('phone-home'),
            'phone_office'=>request('phone-office'),
            'phone_mobile'=>request('phone-mobile'),
            'location_id'=>request('location'),
            'district_id'=>request('district'),
            'type'=>request('type'),
        ]);

        $locationName=Location::find(request('location'))->name;
        $request->session()->flash('flash',"Thank you, we have received your FTTH request for ".$locationName);

        
        /// Send email
       
        Mail::to(['address' => 'neo@enigma.co.ls'])
              ->send(new RequestReceived($survey));



        return redirect('/');

  

    }


    public function export($type)
    {
        $ftthRequests=Survey::latest()->get();

        return Excel::create('FTTH-Requests',function($excel) use ($ftthRequests){
            $excel->sheet('FTTH Requests',function($sheet) use ($ftthRequests){
                $sheet->setOrientation('landscape');
                $sheet->setPageMargin(0.25);
                $sheet->setFontSize(9);
                $sheet->setAllBorders('thin');
                $sheet->fromArray($ftthRequests);

                $sheet->row(1,function($row){
                    $row->setBackground('#0d47a1');
                    $row->setFontColor('#ffffff');
                    $row->setFontSize(12);
                    $row->setFontWeight('bold');
                    $row->setFontFamily('Calibri');
                });
            });

        })->download($type);
    }


    public function ftthAreas()
    {
        return view('ftth-areas');
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
