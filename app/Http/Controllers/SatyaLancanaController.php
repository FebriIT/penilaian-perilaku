<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SatyaLancana;
use App\Models\Opd;
use App\Models\User;
use Illuminate\Support\Facades\Storage;


class SatyaLancanaController extends Controller
{
    public function index()
    {
        $data=SatyaLancana::orderBy('id','desc')->get();
        return view('satyalancana.index',compact('data'));
    }
    public function input()
    {
        $opd=Opd::orderBy('id','desc')->get();
        return view('satyalancana.input',compact('opd'));
    }
    public function post(Request $request)
    {
        $data=new SatyaLancana;
        $data->nip=$request->nip;
        $data->nama=$request->nama;
        $data->jabatan=$request->jabatan;
        $data->masakerja=$request->masakerja;
        if($request->masakerja<=10){
            return back()->with('pesan','Masa Kerja Tidak Valid');
        }elseif($request->masakerja<=20){
            $skls='X';
        }elseif($request->masakerja<=30){
            $skls='XX';
        }elseif($request->masakerja<=40){
            $skls='XXX';
        }else{
            return back()->with('pesan','Masa Kerja Tidak Valid');
        }
        // dd($skls);
        $data->skls=$skls;
        $data->bulan='04';
        $data->tahun='2022';
        $data->pangkat=$request->pangkat;
        $data->status_verifikasi=1;
        $data->keterangan=$request->keterangan;
        $data->user_input=auth()->user()->id;
        $data->user_edit=auth()->user()->id;
        $data->opd_id=$request->opd_id;
        $namaopd=Opd::find($request->opd_id)->namaopd;
        if ($request->has('filesatya')) {
            $datafile=$request->file('filesatya');
            // dd($datafile);
            $filename = $request->nama.'-'.$datafile->getClientOriginalName() . '-' . time() . '.' . $datafile->extension();
            $datafile->move(public_path() . '/storage/filesatya/'.$namaopd.'/'. auth()->user()->username, $filename);
            // $data=$filename;
            $data->filesatya=$filename;
            $data->save();
            return redirect('/'.auth()->user()->role.'/satyalancana')->with('pesan','Data Berhasil Disimpan');
        }else{
            return back()->with('pesan','Data Gagal Disimpan');
        }

    }

    public function hapus($id)
    {
        $satya = SatyaLancana::find($id);
        $opd=Opd::find($satya->opd_id)->namaopd;
        $namainput=User::find($satya->user_input)->username;

        $image_path = '/public/filesatya/' . $opd . '/' . $namainput . '/' . $satya->filesatya;
        // dd(Storage::exists($image_path));
        if (Storage::exists($image_path)) {

            Storage::delete($image_path);
        }
        $satya->delete();
        return back()->with('pesan','Data Berhasil Dihapus');

    }

}
