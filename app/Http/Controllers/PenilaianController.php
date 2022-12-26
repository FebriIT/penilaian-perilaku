<?php

namespace App\Http\Controllers;

use App\Models\JawabanPenilai;
use App\Models\JawabanPertanyaan;
use App\Models\JawabanYangDinilai;
use App\Models\Pertanyaan;
use App\Models\UnitKerja;
use App\Models\User;
use App\Models\User2;
use PDF;
use Illuminate\Http\Request;
use PhpOption\None;

class PenilaianController extends Controller
{
    public function index(Request $request)
    {

        if(auth()->user()->role=='admin'){

            $data=UnitKerja::where('aktif',"=",1)->where('typeunker','!=','')->where('nunker','!=','')->orderBy('nunker','asc')->get();
        }elseif(auth()->user()->role=='user'){
            $data=UnitKerja::where('aktif',"=",1)->where('typeunker','!=','')->where('nunker','!=','')->where('fstatus',1)->orderBy('nunker','asc')->get();


        }

        if($request->ajax()){
            return datatables()->of($data)
            ->addColumn('action',function($f){
                if(auth()->user()->role=='admin'){
                    if($f->fstatus==1){
                        $button='<a href="javascript:void(0)" id="updatestatus" data-id="'.$f->id.'" class="btndanger tabledit-edit-button btn btn-sm btn-danger" style="float: none; margin: 5px;"><span class="ti-close"></span></a>';
                        
                        
                    }else if($f->fstatus==0){
                        $button='<a href="javascript:void(0)" id="updatestatus" data-id="'.$f->id.'" class="btnsuccess tabledit-edit-button btn btn-sm btn-success" style="float: none; margin: 5px;"><span class="ti-check"></span></a>';
                        
                    }
                    $button.='<a href="/admin/penilaian/'.$f->id.'" class="tabledit-edit-button btn btn-sm btn-primary" style="float: none; margin: 5px;"><span class="ti-receipt"></span></a>';
                    $button.='<a href="/admin/penilaian/'.$f->id.'/laporan" class="tabledit-edit-button btn btn-sm btn-warning" style="float: none; margin: 5px;"><span class="ti-download"></span></a>';
    
                }elseif(auth()->user()->role=='user'){
                    
                    $button='<a href="/user/penilaian/'.$f->id.'/laporan" class="tabledit-edit-button btn btn-sm btn-warning" style="float: none; margin: 5px;"><span class="ti-download"></span></a>';
    
                }
                
                return $button;
            })
            ->addColumn('jumlahygdinilai',function($f){
                $jumlahygdinilai=JawabanYangDinilai::where('id_unitkerja',$f->id)->count();
                return $jumlahygdinilai;
            })
            ->addColumn('fstatus',function($f){
                if($f->fstatus==1){
                    $fstatus='<i><span class="badge badge-pill badge-primary">Active</span> </i>';
                }elseif($f->fstatus==0){
                    $fstatus='<i><span class="badge badge-pill badge-primary">Not Active</span></i>';

                }
                return $fstatus;
            })
            ->addColumn('jumlahpns',function($f){
                $jumlahpns=User2::where('kunker',$f->kunker)->count();
                return $jumlahpns;
            })
            ->rawColumns(['action','jumlahygdinilai','fstatus','jumlahpns'])
            ->addIndexColumn()
            ->make(true);
        }
        
        return view('Penilaian.indexadmin',compact('data'));
    }

    public function updatestatus(Request $request)
    {
        
        $data=UnitKerja::find($request->id);
        if($data->fstatus==1){
            $data->update([
                'fstatus'=>0,
            ]);
            // dd('ok');
            
            $message=0;
        }else if($data->fstatus==0){
            $data->update([
                'fstatus'=>1,
            ]);
            $message=1;

        }else{
            $message=2;
        }
        
        // dd($data->nunker);
        return response()->json($message);
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
    public function datapertanyaandelete($nippenilai,$nipygdinilai)
    {
        $nipenilai1=decrypt($nippenilai) ;
        $nipygdinilai1=decrypt($nipygdinilai) ;
        $jpenilai=JawabanPenilai::where('nip_penilai',$nipenilai1)->where('nip_ygdinilai',$nipygdinilai1);
        $sjpertanyaan=JawabanPertanyaan::where('nip_penilai',$nipenilai1)->where('nip_ygdinilai',$nipygdinilai1);
        $sjygdinilai=JawabanYangDinilai::where('nip_ygdinilai',$nipygdinilai1);
        $hasil=$sjygdinilai->first()->hasil-$sjpertanyaan->sum('jawaban');
        $jpenilai=JawabanPenilai::where('nip_penilai',$nipenilai1)->where('nip_ygdinilai',$nipygdinilai1);
        
        // dd($jpenilai->count());
        $sjpertanyaan->delete();
        $jpenilai->delete();
        
        $cbawahan=JawabanPenilai::where('nip_ygdinilai',$nipygdinilai1)->where('tydinilai','1')->count();
        $csejawat=JawabanPenilai::where('nip_ygdinilai',$nipygdinilai1)->where('tydinilai','2')->count();
        $catasan=JawabanPenilai::where('nip_ygdinilai',$nipygdinilai1)->where('tydinilai','3')->count();
        // dd($catasan);
        $sjygdinilai->update([
            'hasil'=>$hasil,
            'atasan'=>$catasan,
            'sejawat'=>$csejawat,
            'bawahan'=>$cbawahan,

        ]);

        return back()->with('pesan','Data Berhasil Dihapus');
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
    public function laporan($id)
    {
        // dd($id);
        $data=JawabanYangDinilai::where('id_unitkerja',$id)->get();
        $unker=UnitKerja::find($id);
        $pegawai=User2::where('kunker',$unker->kunker)->get();
        // // $p=DB::select('SELECT transaksi.*,users.name,users.jk,users.no_anggota,users.nohp FROM transaksi JOIN users ON transaksi.user_id=users.id  WHERE transaksi.status="Kembali" AND transaksi.created_at BETWEEN ? AND ?',[$req->mulai,$req->akhir]);
        // // dd($ps);
        view()->share('p', $data);

        if(auth()->user()->role=='admin'){

            $pdf_doc =PDF::loadView('laporan.ygdinilai', compact('data','pegawai','unker'))->setPaper('a4', 'landscape');
        }elseif(auth()->user()->role=='user'){
            $pdf_doc =PDF::loadView('laporan.ygdinilaiuser', compact('data','pegawai','unker'))->setPaper('a4', 'landscape');

        }

        return $pdf_doc->download($unker->nunker.'- Penilaian Perilaku.pdf');
    }
    


}
