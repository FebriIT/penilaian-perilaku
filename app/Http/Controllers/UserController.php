<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $data=User::all();
        // $data=Opd::orderBy('id','asc')->get();
        // dd($data);
        if($request->ajax()){
            return datatables()->of($data)
            // ->addColumn('action',function($f){
            //     $button='<div class="tabledit-toolbar btn-toolbar" style="text-align: center;">';
            //     $button.='<div class="btn-group btn-group-sm" style="float: none;">';
            //     $button.='<button class="tabledit-edit-button btn btn-sm btn-warning edit-post" data-id='.$f->id.' id="alertify-success" style="float: none; margin: 5px;"><span class="ti-pencil"></span></button>';
            //     $button.='<button class="tabledit-delete-button btn btn-sm btn-danger delete" data-id='.$f->id.' style="float: none; margin: 5px;"><span class="ti-trash"></span></button>';
            //     $button.='</div>';
            //     $button.='</div>';
            //     return $button;
            // })

            // ->rawColumns(['action'])
            ->addIndexColumn()
            ->make(true);
        }
        return view('user.index',compact('data'));
    }
}
