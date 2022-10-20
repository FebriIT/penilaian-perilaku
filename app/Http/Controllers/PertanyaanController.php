<?php

namespace App\Http\Controllers;

use App\Models\Pertanyaan;
use Illuminate\Http\Request;

class PertanyaanController extends Controller
{
    public function index(Request $request)
    {
        $data=Pertanyaan::all();
        if($request->ajax()){
            return datatables()->of($data)
            ->addColumn('action',function($f){
                $button='<div class="tabledit-toolbar btn-toolbar" style="text-align: center;">';
                $button.='<div class="btn-group btn-group-sm" style="float: none;">';
                // $button.='<button class="tabledit-edit-button btn btn-sm btn-warning edit-post" data-id='.$f->id.' id="alertify-success" style="float: none; margin: 5px;"><span class="ti-pencil"></span></button>';

                $button.='<button class="tabledit-delete-button btn btn-sm btn-danger delete" data-id='.$f->id.' style="float: none; margin: 5px;"><span class="ti-trash"></span></button>';
                $button.='</div>';
                $button.='</div>';

                return $button;
            })
            
            ->rawColumns(['action'])
            ->addIndexColumn()
            ->make(true);
        }
        return view('pertanyaan.index');
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $id=$request->id;
       
        $data=Pertanyaan::updateOrCreate(['id'=>$id],
            [
                'text_pertanyaan'=>$request->text_pertanyaan,

            ]
        );
        // dd($check);

        return response()->json($data);
    }

    public function destroy($id)
    {
        $periode = Pertanyaan::find($id);
        
        $periode->delete();
        return response()->json($periode);
    }

    public function edit($id)
    {
        $where = array('id' => $id);
        $post  = Pertanyaan::where($where)->first();

        return response()->json($post);
    }
}
