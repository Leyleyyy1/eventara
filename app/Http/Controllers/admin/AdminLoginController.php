<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminLoginController extends Controller
{
    // Tampilkan form login
    public function showLoginForm()
    {
        // PERBAIKAN DI SINI
        return view('auth.admin.login');
    }

    // Proses login
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        if (Auth::guard('admin')->attempt($credentials)) {
            return redirect()->route('admin.dashboard');
        }

        return back()->withErrors([
            'email' => 'Email atau password salah.',
        ]);
    }
}
