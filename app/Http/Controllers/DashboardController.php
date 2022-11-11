<?php

namespace App\Http\Controllers;

use App\Models\JawabanPenilai;
use App\Models\JawabanYangDinilai;
use App\Models\Periode;
use App\Models\Pertanyaan;
use App\Models\SatyaLancana;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $periode=Periode::where('status',1);

        // dd($dataperiode);
        $datapenilai=JawabanPenilai::all()->count();
        $dataygmenilai=JawabanYangDinilai::all()->count();
        $datapertanyaan=Pertanyaan::all()->count();
        
        return view('dashboard',compact('datapenilai','dataygmenilai','datapertanyaan'));
        


    }
}
