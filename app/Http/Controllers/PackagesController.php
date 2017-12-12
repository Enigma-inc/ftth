<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PackagesLookup;
use App\PrepaidPackage;
use App\ContractPackage;

class PackagesController extends Controller
{
    function __construct(){
        $this->middleware('auth');
    }

    public function index(Request $request){
        if(request('type') !== null){
            return PackagesLookup::whereType(request('type'))->get();
        }

        return PackagesLookup::all();

    }

    public function prepaidPackages(){
        $prepaidPackages = PrepaidPackage::latest()->paginate(10);

        return view('admin.packages.prepaid.index')
                ->with('prepaidPackages', $prepaidPackages);
    }

    public function storePrepaidPackage(){

        $prepaidPackage = PrepaidPackage::create([
            'name' => request('name'),
            'price' => request('price')
        ]);

        return redirect()->route('prepaidPackages.list');
    }

    public function editPrepaidPackage($id){

        $prepaidPackage = PrepaidPackage::find($id);

        return view('admin.packages.prepaid.edit')
               ->with('prepaidPackage', $prepaidPackage);
    }

    public function updatePrepaidPackage(Request $request, $id){
        $prepaidPackage = PrepaidPackage::find($id);

        $prepaidPackage->name = $request->input('name');
        $prepaidPackage->price = $request->input('price');

        $prepaidPackage->save();
        return redirect()->route('prepaidPackages.list');
    }

    public function destroyPrepaidPackage($id){
        $deletedPrepaidPackage = PrepaidPackage::find($id)
                               ->delete();
        return redirect()->route('prepaidPackages.list');
    }
}