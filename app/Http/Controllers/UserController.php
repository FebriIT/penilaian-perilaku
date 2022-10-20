<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\User2;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $data=User2::all();
        // $data=Opd::orderBy('id','asc')->get();
        // dd($data);
        if($request->ajax()){
            return datatables()->of($data)
   
            ->addIndexColumn()
            ->make(true);
        }
        return view('user.index',compact('data'));
    }
}
