<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Auth::attempt will check email & password (hashed)
        if (Auth::attempt($credentials, $request->boolean('remember'))) {
            $request->session()->regenerate(); // prevent session fixation

            // Get user role and redirect accordingly (Section B)
            $user = Auth::user()->role;

            // Redirect based on role
            switch ($user) {
                case 'admin':
                    return redirect()->intended('/admin-dashboard');
                case 'mahasiswa':
                    return redirect()->intended('/mahasiswa-dashboard');
                default:
                    return redirect()->intended('/dashboard');
            }
        }

        return back()->withErrors([
            'email' => 'Email atau password salah.',
        ])->onlyInput('email');
    }

    public function logout(Request $x)
    {
        Auth::logout();
        $x->session()->invalidate();
        $x->session()->regenerateToken();
        return redirect('login');
    }
    public function showRegister()
    {
        return view('auth.register');
    }
    public function register(Request $x)
    {
        $data = $x->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6|confirmed',
            'role' => 'required|in:mahasiswa,dosen',
        ]);

        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'role' => $data['role'],
        ]);

        Auth::login($user);

        // Redirect based on role after registration
        switch ($user->role) {
            case 'admin':
                return redirect()->intended('/admin-dashboard');
            case 'mahasiswa':
                return redirect()->intended('/mahasiswa-dashboard');
            case 'dosen':
                return redirect()->intended('/dashboard');
            default:
                return redirect()->intended('/dashboard');
        }
    }
}
