<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function index()
    {
        return view('profile');
    }

    public function changepassword(Request $request)
    {
        $this->validate($request, [

            'password_lama'=>'required',
            'password' => 'required_with:password_confirm|same:password_confirm',
            'password_confirm' => 'required'
        ]);
        if(Hash::check($request->password_lama, Auth::user()->password)){
            $newpw=bcrypt($request->password);
            $data=User::find(auth()->user()->id);
            $data->update(['password'=>$newpw]);
            return redirect()->back()->with('berhasil','Password berhasil diubah');
        }else{
            return redirect()->back()->with('gagal','Periksa password lama anda');
        }
    }
}
