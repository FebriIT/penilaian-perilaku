<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Opd;


class OpdController extends Controller
{
    public function index()
    {
        $data=Opd::orderBy('id','desc')->get();
        return view('opd.index',compact('data'));
    }

    public function post(Request $request)
    {
        $data=new Opd;
        $data->namaopd=$request->namaopd;
        $data->save();

        return back()->with('pesan','Data Berhasil Disimpan');
    }

    public function destroy($id)
    {
        $data=Opd::find($id);
        $data->delete();
        return back()->with('pesan','Data Berhasil Dihapus');
    }
}
