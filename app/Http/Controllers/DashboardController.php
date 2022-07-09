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

        $Cexists=$periode->exists();
        if($Cexists){
            $countsatya=SatyaLancana::all()->count();
            $sedangdiproses=SatyaLancana::where('status_verifikasi',1)->count();
            $datasudahlengkap=SatyaLancana::where('status_verifikasi',2)->count();
            $databelumlengkap=SatyaLancana::where('status_verifikasi',3)->count();
            $dataadmin=SatyaLancana::where('user_input',1)->count();
            $datauser=SatyaLancana::where('user_input',2)->count();
            
            $data=SatyaLancana::orderBy('id','desc')->get();
            return view('dashboard',compact('data','countsatya','sedangdiproses','datasudahlengkap','databelumlengkap','dataadmin','datauser'));
        }else{
            return view('satyalancana.periodeberakhir');
        }


    }
}
