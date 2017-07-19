<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PackagesLookup;

class PackagesController extends Controller
{
    public function index(Request $request){
        if(request('type') !== null){
            return PackagesLookup::whereType(request('type'))->get();
        }

        return PackagesLookup::all();

    }
}