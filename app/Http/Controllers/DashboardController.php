<?php

namespace App\Http\Controllers;

use App\Models\Periode;
use App\Models\SatyaLancana;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $periode=Periode::where('status',1);

        // dd($dataperiode);

        
            return view('dashboard');
        


    }
}
