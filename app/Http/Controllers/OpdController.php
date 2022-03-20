<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Opd;
use App\Models\SatyaLancana;
use Yajra\DataTables\Services\DataTable;
use Illuminate\Support\Str;


class OpdController extends Controller
{
    public function index(Request $request)
    {
        $data=Opd::orderBy('id','asc')->get();
        // dd($data);
        if($request->ajax()){
            return datatables()->of($data)
            ->addColumn('action',function($f){

                $button='<div class="tabledit-toolbar btn-toolbar" style="text-align: center;">';
                $button.='<div class="btn-group btn-group-sm" style="float: none;">';
                $button.='<button class="tabledit-edit-button btn btn-sm btn-warning edit-post" data-id='.$f->id.' id="alertify-success" style="float: none; margin: 5px;"><span class="ti-pencil"></span></button>';
                $button.='<button class="tabledit-delete-button btn btn-sm btn-danger delete" data-id='.$f->id.' style="float: none; margin: 5px;"><span class="ti-trash"></span></button>';
                $button.='</div>';
                $button.='</div>';

                return $button;
            })

            ->rawColumns(['action'])
            ->addIndexColumn()
            ->make(true);
        }

        return view('opd.index',compact('data'));
    }

    public function store(Request $request)
    {
        $id = $request->id;
        // dd($request->all());
        $post   =   Opd::updateOrCreate(['id' => $id],
                    [
                        'namaopd' => $request->namaopd,
                    ]);

        return response()->json($post);
    }

    public function destroy($id)
    {
        $satya=SatyaLancana::where('opd_id',$id)->delete();
        $post = Opd::where('id',$id)->delete();
        // $subkategori=SubKategori::where('kategori_jasa_id',$id);

        return response()->json($post);
    }

    public function edit($id)
    {
        $where = array('id' => $id);
        $post  = Opd::where($where)->first();

        return response()->json($post);
    }

}
