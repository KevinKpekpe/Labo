<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthConroller extends Controller
{
    public function login(){
        return view('auth.form');
    }
    public function doLogin(Request $request){
        //dd($request->email);
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)){
            if(auth()->user()->role == 'admin'){
                return redirect()->route('admin.home');
            }
            if(auth()->user()->role == 'docteur'){
                return redirect()->route('docteur.home');
            }
            if(auth()->user()->role == 'secretaire'){
                return redirect()->route('secretaire.home');
            }
        }else {
            return redirect()->back()->withInput()->withErrors(['email' => 'Invalid credentials']);
        }
    }
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}
