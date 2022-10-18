<?php

namespace App\Http\Controllers;

use App\Models\Periode;
use App\Models\SatyaLancana;
use Illuminate\Http\Request;

class PeriodeController extends Controller
{
    public function index(Request $request)
    {
        $data=Periode::all();
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
            ->addColumn('status',function($f){
                if($f->status==1){
                    $status='<b style="color:green;">Open</b>';
                }elseif($f->status==0){
                    $status='<b style="color:red;">Close</b>';
                }else{
                    $status='Status Error';
                }
                return $status;
            })
            ->addColumn('end',function($f){
                $end=$f->end->format('d M Y');
                return $end;
            })
            ->addColumn('start',function($f){
                $start=$f->start->format('d M Y');
                return $start;
            })
            ->rawColumns(['action','status'])
            ->addIndexColumn()
            ->make(true);
        }
        return view('periode.index');
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $id=$request->id;
        
        if($id==null){

            $data=Periode::updateOrCreate(['id'=>$id],
                [
                    'title'=>$request->title,
                    'start'=>$request->start,
                    'end'=>$request->end,
                    'status'=>$request->status,
                    'max_penilai'=>$request->max_penilai
                ]
            );
        }else{
            $data=Periode::updateOrCreate(['id'=>$id],
                [
                    'max_penilai'=>$request->max_penilai,
                    'status'=>$request->status
                ]
            );
        }
        // dd($check);

        return response()->json($data);
    }

    public function destroy($id)
    {
        $periode = periode::find($id);
        
        $periode->delete();
        return response()->json($periode);
    }

    public function edit($id)
    {
        $where = array('id' => $id);
        $post  = Periode::where($where)->first();

        return response()->json($post);
    }
}
