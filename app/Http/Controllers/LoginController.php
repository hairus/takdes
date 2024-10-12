<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        // Validasi input
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Cek kredensial login
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            if(Auth::user()->role == 'admin') {
                return redirect()->intended('/home');
            }else{

                return redirect()->intended('/profile');
            }

            return redirect()->back()->withErrors([
                'email' => 'Email atau password salah.',
            ]);
        }

        // Jika gagal, kembali ke halaman login dengan error
        return redirect()->back()->withErrors([
            'email' => 'Email atau password salah.',
        ]);
    }
}
