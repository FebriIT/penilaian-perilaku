<?php

namespace App\Http\Controllers;

use App\Models\Pengaturan;
use Illuminate\Http\Request;

class AwalController extends Controller
{
    public function index()
    {
        $data=Pengaturan::find(1);
        return view('awal',compact('data'));
    }
}
