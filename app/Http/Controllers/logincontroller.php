<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        // Validasi input
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        // Autentikasi logika sederhana (tanpa database)
        $email = $request->input('email');
        $password = $request->input('password');

        if ($email === 'user@example.com' && $password === 'password') {
            return redirect()->intended('/');
        } else {
            return redirect()->back()->withErrors(['login_error' => 'Email atau password salah.']);
        }
    }
}
