<?php

namespace App\Http\Controllers;

use App\Models\JawabanPenilai;
use App\Models\JawabanPertanyaan;
use App\Models\JawabanYangDinilai;
use App\Models\Pengaturan;
use App\Models\Pertanyaan;
use App\Models\UnitKerja;
use App\Models\User;
use App\Models\User2;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MulaiMenilaiController extends Controller
{
    public function index(Request $request)
    {
        // SELECT * FROM `unkerja` WHERE aktif=1 AND typeunker!="" AND nunker!=""
        $pengaturan=Pengaturan::find(1)->status;
        if($pengaturan==1){

        

            $data=UnitKerja::where('aktif',"=",1)->where('typeunker','!=','')->where('nunker','!=','')->orderBy('nunker','asc')->get();
            // $data=Opd::orderBy('id','asc')->get();
            // dd($request->ajax());
            
            // dd($data);
            if($request->ajax()){
                // dd('ok');
                return datatables()->of($data)
                ->addColumn('action',function($f){
                    
                    $button='<a href="/pilihpegawai/'.$f->kunker.'" class="tabledit-edit-button btn btn-sm btn-primary" style="float: none; margin: 5px;"><span class="ti-receipt"></span></a>';
                    

                    return $button;
                })
                ->rawColumns(['action'])
                
                ->addIndexColumn()
                ->make(true);
            }
            return view('penilaian.pilihopd',compact('data'));
        }else{
            return back();
        }
    }
    public function open($id,Request $request)
    {
        // dd($id);
        // $dataid=decrypt($id);
        
        $data=User2::where('kunker','=',$id)->get();
        if($request->ajax()){
            return datatables()->of($data)
            ->addColumn('action',function($f){
                $button='<a href="/mulaimenilai/'.encrypt($f->nipbaru).'" class="tabledit-edit-button btn btn-sm btn-primary" style="float: none; margin: 5px;"><span class="ti-receipt"></span></a>';
                return $button;
            })
            ->rawColumns(['action'])
            
            ->addIndexColumn()
            ->make(true);
        }
        $ids=$id;
        
        
        // dd($dataid);
        return view('penilaian.pilihpegawai',compact('data','ids'));
    }
    public function mulaimenilai($nip)
    {
        $dataid=decrypt($nip);
        // dd($dataid);
        $data=User2::where('nipbaru',$dataid)->first();
        $pertanyaan=Pertanyaan::all();

        return view('Penilaian.mulaimenilai',compact('data','pertanyaan'));
    }

    public function getNip(Request $request)
    {   
        // dd($request->all());
        // dd($id);
        if (JawabanPenilai::where('nip_penilai',$request->dnip)->where('nip_ygdinilai',$request->nipygdinilai)->exists()) {
            $data=1;
        }else if(User2::where('nipbaru',$request->dnip)->exists()){
            $data=User2::where('nipbaru',$request->dnip)->first()->nama;
        }else{
            $data=0;
            
        }
        
        return json_encode($data);
    }
    public function postnilai(Request $request)
    {
        // $validate=$this->validate($request,[
        //     'pilih.*'=>'required|in:1,2,3',
            
        // ]);
        // dd($request->all());
        $pilih = $request->pilih;
        // dd(count($pilih>=21));
        if(count($pilih)==21){
            // dd('true');
            foreach($pilih as $key=>$value){
                
                $jwb=new JawabanPertanyaan;
                $jwb->id_pertanyaan=explode('#',$value)[1];
                $jwb->jawaban=explode('#',$value)[0];
                $jwb->nip_penilai=$request->inputnip;
                $jwb->nip_ygdinilai=$request->nipygdinilai;
                $jwb->save();
            }

            //perhitungan
            // 1 = bawahan
            // 2 = sejawat
            // 3 = atasan
            // dd($request->tyDinilai);
            if (JawabanPenilai::where('nip_penilai',$request->inputnip)->where('nip_ygdinilai',$request->nipygdinilai)->exists()) {
                dd($request->inputnip.' '.$request->nipygdinilai);
                
                
            }else{
                $datauser1=User2::where('nipbaru',$request->inputnip)->first();
                $idUnitkerja1=UnitKerja::where('kunker',$datauser1->kunker)->first()->id;
                //perhitungan nilai ygdinilai
                $hasil1=JawabanPertanyaan::where('nip_penilai',$request->inputnip)->where('nip_ygdinilai',$request->nipygdinilai)->sum('jawaban');
                // dd($hasil1);
                // dd($request->all());
                $jPenilai=new JawabanPenilai;
                $jPenilai->nip_penilai=$request->inputnip;
                $jPenilai->nip_ygdinilai=$request->nipygdinilai;
                $jPenilai->tydinilai=$request->tyDinilai;
                $jPenilai->id_unitkerja=$idUnitkerja1;
                $jPenilai->hasil=$hasil1;
                // dd('ok');
                $jPenilai->save();
            }

            if (JawabanYangDinilai::where('nip_ygdinilai',$request->nipygdinilai)->exists()) {
                
                $iDdYgDinilai=JawabanYangDinilai::where('nip_ygdinilai',$request->nipygdinilai)->first()->id;
                $dYgDinilai=JawabanYangDinilai::find($iDdYgDinilai);
                
                
                if($request->tyDinilai==3){
                    $countjumlah=JawabanPenilai::where('tydinilai',3)->where('nip_ygdinilai',$request->nipygdinilai)->count();
                    $nilaisebelumnya=$dYgDinilai->hasil;
                    $hasilygdinput=JawabanPertanyaan::where('nip_ygdinilai',$request->nipygdinilai)->where('nip_penilai',$request->inputnip)->sum('jawaban');
                    $hasilakhir=$nilaisebelumnya+$hasilygdinput;
                    $dYgDinilai->update([
                        'hasil'=>$hasilakhir,
                        'atasan'=>$countjumlah
                    ]);
                    // dd($hasilakhir);

                }else if($request->tyDinilai==2){
                    $countjumlah1=JawabanPenilai::where('tydinilai',2)->where('nip_ygdinilai',$request->nipygdinilai)->count();

                    $nilaisebelumnya1=$dYgDinilai->hasil;
                    $hasilygdinput1=JawabanPertanyaan::where('nip_ygdinilai',$request->nipygdinilai)->where('nip_penilai',$request->inputnip)->sum('jawaban');
                    $hasilakhir1=$nilaisebelumnya1+$hasilygdinput1;
                    $dYgDinilai->update([
                        'hasil'=>$hasilakhir1,
                        'sejawat'=>$countjumlah1
                    ]);
                    // dd($countjumlah);

                }else if($request->tyDinilai==1){
                    $countjumlah2=JawabanPenilai::where('tydinilai',1)->where('nip_ygdinilai',$request->nipygdinilai)->count();

                    $nilaisebelumnya2=$dYgDinilai->hasil;
                    $hasilygdinput2=JawabanPertanyaan::where('nip_ygdinilai',$request->nipygdinilai)->where('nip_penilai',$request->inputnip)->sum('jawaban');
                    $hasilakhir2=$nilaisebelumnya2+$hasilygdinput2;
                    $dYgDinilai->update([
                        'hasil'=>$hasilakhir2,
                        'bawahan'=>$countjumlah2
                    ]);
                }
                


            }else{
                // dd($request->all());
                $datauser=User2::where('nipbaru',$request->nipygdinilai)->first();
                $id_unitkerja=UnitKerja::where('kunker',$datauser->kunker)->first()->id;
                //perhitungan nilai ygdinilai
                $hasil=JawabanPertanyaan::where('nip_ygdinilai',$request->nipygdinilai)->sum('jawaban');
                
                // dd($request->all());
                
                $perhitungan33=new JawabanYangDinilai();
                $perhitungan33->nip_ygdinilai=$request->nipygdinilai;
                $perhitungan33->id_unitkerja=$id_unitkerja;
                $perhitungan33->hasil=$hasil;
                if($request->tyDinilai==1){
                    $countjumlah33=JawabanPenilai::where('tydinilai',1)->where('nip_ygdinilai',$request->nipygdinilai)->count();
                    $perhitungan33->bawahan=$countjumlah33;                    
                }else if($request->tyDinilai==2){
                    $countjumlah33=JawabanPenilai::where('tydinilai',2)->where('nip_ygdinilai',$request->nipygdinilai)->count();
                    $perhitungan33->sejawat=$countjumlah33;
                }else if($request->tyDinilai==3){
                    $countjumlah33=JawabanPenilai::where('tydinilai',3)->where('nip_ygdinilai',$request->nipygdinilai)->count();
                    $perhitungan33->atasan=$countjumlah33;
                }
                // $perhitungan->atasan=$hasil;
                $perhitungan33->save();
                // dd('ok');    
            }
            return redirect()->back()->with('berhasil','Penilaian Berhasil');
        }else{
            return redirect()->back()->with('gagal','Terdapat form yang belum terisi, Silahkan isi kembali seluruh form');
        }


        // dd($request->all());
    }
}
