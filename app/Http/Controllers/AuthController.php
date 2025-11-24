<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('login');
    }

    public function login(Request $x){
        $data = $x->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        
        if(Auth::attempt($data)){
            $x->session()->regenerate();

            return redirect()->intended('/mahasiswa');
        }else{
            return back()->withErrors(['email' => 'Email atau password salah'])->onlyInput('email');
        }
    }

        public function logout(Request $x){
        Auth::logout();
        $x->session()->invalidate();
        $x->session()->regenerateToken();
        return redirect('login');
    }
}
