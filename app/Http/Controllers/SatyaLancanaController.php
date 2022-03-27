<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SatyaLancana;
use App\Models\Opd;
use App\Models\User;
use Illuminate\Support\Facades\Storage;


class SatyaLancanaController extends Controller
{
    public function index(Request $request)
    {
        $data=SatyaLancana::orderBy('id','desc')->get();
        $opd=Opd::orderBy('id','desc')->get();
        if($request->ajax()){
            return datatables()->of($data)
            ->addColumn('nama',function($f){
                $nama=$f->nama.'<br> NIP.'.$f->nip.'<br> '.$f->pangkat;
                return $nama;
            })
            ->addColumn('action',function($f){

                $button='<div class="tabledit-toolbar btn-toolbar" style="text-align: center;">';
                $button.='<div class="btn-group btn-group-sm" style="float: none;">';
                $button.='<a href="/'.auth()->user()->role.'/satyalancana/download/'.$f->id.'"
                                                            class="tabledit-edit-button btn btn-sm btn-primary"
                                                            style="float: none; margin: 5px;">
                                                            <span class="ti-download"></span>
                                                        </a>';
                // $button.='<button class="tabledit-edit-button btn btn-sm btn-warning edit-post" data-id='.$f->id.' id="alertify-success" style="float: none; margin: 5px;"><span class="ti-pencil"></span></button>';
                $button.='<button class="tabledit-delete-button btn btn-sm btn-danger delete" data-id='.$f->id.' style="float: none; margin: 5px;"><span class="ti-trash"></span></button>';
                $button.='</div>';
                $button.='</div>';

                return $button;
            })
            ->addColumn('opd',function($f){
                $opd=$f->opd->namaopd;
                return $opd;
            })
            ->addColumn('status',function($f){
                if ($f->status_verifikasi==1){
                    $status='<div style="background: blue;color:white;"><b>Sedang Di Proses</b></div>';
                }elseif($f->status_verifikasi==2){
                    $status='<div style="background: rgb(0, 245, 0);color:white;"><b>Data Sudah Lengkap</b></div>';

                }elseif($f->status_verifikasi==3){
                    $status='<div style="background: rgb(245, 0, 0);color:white;"><b>Data Belum Lengkap</b></div>';

                }


                return $status;
            })
            ->addColumn('keterangan',function($f){
                $keterangan=$f->keterangan;
                return $keterangan;
            })

            ->rawColumns(['action','nama','opd','status'])
            ->addIndexColumn()
            ->make(true);
        }
        return view('satyalancana.index',compact('data','opd'));
    }
    public function input()
    {
        $opd=Opd::orderBy('id','desc')->get();
        return view('satyalancana.input',compact('opd'));
    }
    public function post(Request $request)
    {
        $validated = $request->validate([
            'nip' => 'required|unique:satyalancana,nip|max:13',
            'nama' => 'required',
            'pangkat' => 'required',
            'jabatan' => 'required',
        ]);
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
            $filename = $request->nama.'-'.$request->nip.'-'.$datafile->getClientOriginalName() . '-' . time() . '.' . $datafile->extension();
            $datafile->move(public_path() . '/storage/filesatya/04-2022/'.$namaopd.'/'. auth()->user()->username, $filename);
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

        $image_path = '/public/filesatya/04-2022/' . $opd . '/' . $namainput . '/' . $satya->filesatya;
        // dd(Storage::exists($image_path));
        if (Storage::exists($image_path)) {

            Storage::delete($image_path);
        }
        $satya->delete();
        return back()->with('pesan','Data Berhasil Dihapus');

    }

    public function getDownload($id)
    {
        $satya=SatyaLancana::find($id);
        $opd=Opd::find($satya->opd_id)->namaopd;
        $namainput=User::find($satya->user_input)->name;

        $file_path = public_path().'/storage/filesatya/04-2022/' . $opd . '/' . $namainput . '/' . $satya->filesatya;
        // dd(file_exists(public_path().$file_path));
        return  response()->download($file_path);
    }



    //javascript
    public function store(Request $request)
    {
        $id = $request->id;
        // dd($request->all());
        if($request->masakerja<10){
            return back()->with('pesan','Masa Kerja Tidak Valid');
        }elseif($request->masakerja<20){
            $skls='X';
        }elseif($request->masakerja<30){
            $skls='XX';
        }elseif($request->masakerja<40){
            $skls='XXX';
        }else{
            return back()->with('pesan','Masa Kerja Tidak Valid');
        }

        // upload file
        $namaopd=Opd::find($request->opd_id)->namaopd;

        if ($request->has('filesatya')) {
            $datafile=$request->file('filesatya');
            // dd($datafile);
            $filename = $request->nama.'-'.$request->nip.'-'.$datafile->getClientOriginalName() . '-' . time() . '.' . $datafile->extension();
            $datafile->move(public_path() . '/storage/filesatya/04-2022/'.$namaopd.'/'. auth()->user()->username, $filename);
            // $data=$filename;

            $post=SatyaLancana::updateOrCreate(['id' => $id],
                    [
                        'nip' => $request->nip,
                        'nama'=>$request->nama,
                        'jabatan'=>$request->jabatan,
                        'masakerja'=>$request->masakerja,
                        'skls'=>$skls,
                        'bulan'=>'04',
                        'tahun'=>'2022',
                        'pangkat'=>$request->pangkat,
                        'status_verifikasi'=>1,
                        'keterangan'=>$request->keterangan,
                        'user_input'=>auth()->user()->id,
                        'user_edit'=>auth()->user()->id,
                        'opd_id'=>$request->opd_id,
                        'filesatya'=>$filename,
                    ]);
            $pesan='berhasil';

        }else{
            $pesan='gagal';
        }

        return response()->json($pesan);
    }

    public function destroy($id)
    {
        $satya = SatyaLancana::find($id);
        $opd=Opd::find($satya->opd_id)->namaopd;
        $namainput=User::find($satya->user_input)->username;

        $image_path = '/public/filesatya/04-2022/' . $opd . '/' . $namainput . '/' . $satya->filesatya;
        // dd(Storage::exists($image_path));
        if (Storage::exists($image_path)) {

            Storage::delete($image_path);
        }
        $satya->delete();

        return response()->json($satya);
    }

    public function edit($id)
    {
        $where = array('id' => $id);
        $post  = Opd::where($where)->first();

        return response()->json($post);
    }

}
