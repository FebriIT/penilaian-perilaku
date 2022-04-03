<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }
    public function proses_login(Request $request)
    {
        if($request->remember===null){
            setcookie('username',$request->username,100);
            setcookie('password',$request->password,100);
        }else{
            // dd('ok');
            setcookie('username',$request->username,time()+60*60*24*100);
            setcookie('password',$request->password,time()+60*60*24*100);
        }
        // dd($request->all());

        if (Auth::attempt(['username' => $request->username, 'password' => $request->password])) {
            if (auth()->user()->role == 'admin') {
                // dd(auth()->user()->role);
                return redirect(route('dashboard.admin'))->with('pesan','Anda Login Sebagai "'.auth()->user()->name.'"');
            } elseif (auth()->user()->role == 'user') {
                return redirect(route('dashboard.user'))->with('pesan','Anda Login Sebagai "'.auth()->user()->name.'"');
            }
        } else {
            return redirect('/')->with('gagal','Periksa Username dan Password anda');
        }

        return redirect()->back();
    }

    public function register()
    {
        return view('auth.register');
    }
    public function proses_register(Request $request)
    {
        // dd($request->all());
        $this->validate($request, [
            'name' => 'required',
            'username' => 'required|unique:users,username',
            'email' => 'required|email|unique:users',
            'password' => 'required_with:password-confirm|same:password-confirm',
            'password-confirm' => 'required'
        ]);
        User::create([
            'name' => $request->name,
            'username'=>$request->username,
            'email' => $request->email,
            'role'=>'user',
            'password' => bcrypt($request->password)
        ]);

        return redirect()->back();
    }
    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }

}
