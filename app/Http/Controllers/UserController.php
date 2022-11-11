<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\User2;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $data=User2::all();
        // $response=Http::withBasicAuth('absen','absen2022')->get('https://presensi.jambikota.go.id/api/Pegawai/?ABSEN-API-KEY=pkap');

        // $data=Opd::orderBy('id','asc')->get();
        // dd($data);
        if($request->ajax()){
            return datatables()->of($data)
   
            ->addIndexColumn()
            ->make(true);
        }
        return view('user.index',compact('data'));
    }
}
