<?php

namespace App\Http\Controllers;

use App\Models\SatyaLancana;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $countsatya=SatyaLancana::all()->count();
        $sedangdiproses=SatyaLancana::where('status_verifikasi',1)->count();
        $datasudahlengkap=SatyaLancana::where('status_verifikasi',2)->count();
        $databelumlengkap=SatyaLancana::where('status_verifikasi',3)->count();

        $data=SatyaLancana::orderBy('id','desc')->get();
        return view('dashboard',compact('data','countsatya','sedangdiproses','datasudahlengkap','databelumlengkap'));
    }
}
