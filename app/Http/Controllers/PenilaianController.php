<?php

namespace App\Http\Controllers;

use App\Models\JawabanPenilai;
use App\Models\JawabanPertanyaan;
use App\Models\JawabanYangDinilai;
use App\Models\Pertanyaan;
use App\Models\UnitKerja;
use App\Models\User;
use App\Models\User2;
use Illuminate\Http\Request;

class PenilaianController extends Controller
{
    public function index(Request $request)
    {
        
        $data=UnitKerja::where('aktif',"=",1)->where('typeunker','!=','')->where('nunker','!=','')->orderBy('nunker','asc')->get();

        if($request->ajax()){
            return datatables()->of($data)
            ->addColumn('action',function($f){
                
                $button='<a href="/admin/penilaian/'.$f->id.'" class="tabledit-edit-button btn btn-sm btn-primary" style="float: none; margin: 5px;"><span class="ti-receipt"></span></a>';
                
                return $button;
            })
            ->addColumn('jumlahygdinilai',function($f){
                $jumlahygdinilai=JawabanYangDinilai::where('id_unitkerja',$f->id)->count();
                return $jumlahygdinilai;
            })
            ->rawColumns(['action','jumlahygdinilai'])
            ->addIndexColumn()
            ->make(true);
        }
        
        return view('penilaian.indexadmin',compact('data'));
    }

 
    public function indexx($id)
    {
        $data=JawabanYangDinilai::where('id_unitkerja',$id)->get();
        return view('Penilaian.openadmin',compact('data'));
    }
    public function datapenilai($dnip)
    {
        $nip=decrypt($dnip);
        
        $data=JawabanPenilai::where('nip_ygdinilai',$nip)->get();
        $jumlahpenilai=JawabanPenilai::where('nip_ygdinilai',$nip)->count();

        $jwbygdinilai=JawabanYangDinilai::where('nip_ygdinilai',$nip)->first()->hasil;
        // dd($jumlahpenilai);
        $user=User2::where('nipbaru',$nip)->first();
        $jumlahpertanyaan=Pertanyaan::all()->count();
        // $skor=

        return view('Penilaian.datapenilai',compact('data','nip','user','jumlahpertanyaan','jwbygdinilai','jumlahpenilai'));
    }

    public function datapertanyaan($nippenilai,$nipygdinilai)
    {
        $nipenilai1=decrypt($nippenilai) ;
        $nipygdinilai1=decrypt($nipygdinilai) ;
        $jawaban=JawabanPertanyaan::where('nip_penilai',$nipenilai1)->where('nip_ygdinilai',$nipygdinilai1)->sum('jawaban');
        $data=JawabanPertanyaan::where('nip_penilai',$nipenilai1)->where('nip_ygdinilai',$nipygdinilai1)->get();
        $jumlahpertanyaan=Pertanyaan::all()->count();
        return view('Penilaian.datapertanyaan',compact('data','nipenilai1','nipygdinilai1','jawaban','jumlahpertanyaan'));
    }
    public function hapus($did)
    {
        $id=decrypt($did);
        $data=JawabanYangDinilai::where('nip_ygdinilai',$id);
        // dd($data);
        JawabanPertanyaan::where('nip_ygdinilai',$id)->delete();
        JawabanPenilai::where('nip_ygdinilai',$id)->delete();
        // $jwbpenilai=JawabanPenilai::where('')
        $data->delete();
        return back()->with('sukses','Data Berhasil Dihapus');
    }


}
