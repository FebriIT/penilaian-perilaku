<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ApiAbsensiController extends Controller
{
    public function index()
    {
        $response=Http::withBasicAuth('absen','absen2022')->get('https://presensi.jambikota.go.id/api/Pegawai/?ABSEN-API-KEY=pkap');
        return $response->json();
    }
}
