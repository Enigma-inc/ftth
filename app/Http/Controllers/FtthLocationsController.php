<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\FtthLocation;

class FtthLocationsController extends Controller
{
    function __construct(){
        $this->middleware('auth');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ftthLocations = FtthLocation::latest()->paginate(10);

        return view('admin.ftth-locations.index')
                ->with('ftthLocations', $ftthLocations);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $ftthLocationObject = FtthLocation::create([
            'name' => request('name'),
            'description' => request('description')
        ]);

        return redirect()->route('ftthLocations.list');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ftthLocation = FtthLocation::find($id);

        return view('admin.ftth-locations.edit')
               ->with('ftthLocation', $ftthLocation);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $ftthLocation = FtthLocation::find($id);

        $ftthLocation->name = $request->input('name');
        $ftthLocation->description = $request->input('description');

        $ftthLocation->save();

        return redirect()->route('ftthLocations.list');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deletedFtthLocation = FtthLocation::find($id)
                                            ->delete();
        return redirect()->route('ftthLocations.list');
    }
}
