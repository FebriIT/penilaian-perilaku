<?php

namespace App\Http\Controllers;

use App\Models\Pengaturan;
use Illuminate\Http\Request;

class PengaturanController extends Controller
{
    public function index()
    {
        $data=Pengaturan::find(1);

        return view('pengaturan.index',compact('data'));
    }

    public function update(Request $request)
    {
        // dd($request->status);
        $data=Pengaturan::find(1);
        $status=$request->status;
        $data->update([
            'status'=>$status
        ]);
        return back();
    }
}
