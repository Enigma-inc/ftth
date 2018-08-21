<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PackagesLookup;

class PagesController extends Controller
{
    public function home()
    {
        $packages = PackagesLookup::all();
        return view('welcome')->with(['packages' => $packages]);
    }
    public function ftthAreas()
    {
        return view('ftth-areas');
    }
}
