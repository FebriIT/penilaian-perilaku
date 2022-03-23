<?php

namespace App\Http\Controllers;

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
            setcookie('username',$request->email,time()+60*60*24*100);
            setcookie('password',$request->password,time()+60*60*24*100);
        }
        // dd($request->all());

        if (Auth::attempt(['username' => $request->username, 'password' => $request->password])) {
            if (auth()->user()->role == 'admin') {
                // dd(auth()->user()->role);
                return redirect(route('dashboard.admin'));
            } elseif (auth()->user()->role == 'user') {
                return redirect(route('user.jasa'));
            }
        } else {
            return redirect('/')->with('error','');
        }

        return redirect()->back();
    }
    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }

}
