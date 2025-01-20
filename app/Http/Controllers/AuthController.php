<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    // Menampilkan form login
    public function showLoginForm()
    {
        // Cek apakah user sudah login
        $user = Session::get('user');

        if ($user) {
            // Jika user sudah login, redirect ke dashboard sesuai role
            if ($user['role'] === 'admin') {
                return redirect('admin/dashboard');
            } else {
                return redirect('user/dashboard');
            }
        }

        // Jika belum login, tampilkan form login
        return view('auth.login');
    }

    // Menampilkan form register
    public function showRegisterForm()
    {
        // Cek apakah user sudah login
        $user = Session::get('user');

        if ($user) {
            // Jika user sudah login, redirect ke dashboard sesuai role
            if ($user['role'] === 'admin') {
                return redirect('admin/dashboard');
            } else {
                return redirect('user/dashboard');
            }
        }

        // Jika belum login, tampilkan form register
        return view('auth.register');
    }

    // Proses login
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Mencari user berdasarkan email
        $user = DB::table('users')->where('email', $request->email)->first();

        // Verifikasi password
        if ($user && password_verify($request->password, $user->password)) {
            // Simpan data user dalam session
            Session::put('user', [
                'id' => $user->id,
                'name' => $user->name,
                'email' => $user->email,
                'role' => $user->role
            ]);

            // Redirect berdasarkan role user
            if ($user->role === 'admin') {
                return redirect('admin/dashboard');
            } else {
                return redirect('user/dashboard');
            }
        } else {
            // Kembali ke halaman login jika kredensial salah
            return redirect()->back()->withErrors(['error' => 'Invalid credentials'])->withInput();
        }
    }

    // Proses registrasi
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);

        // Menambahkan user baru ke database
        DB::table('users')->insert([
            'name' => $request->name,
            'email' => $request->email,
            'password' => password_hash($request->password, PASSWORD_BCRYPT), // Hash password menggunakan bcrypt
            'role' => 'user', // Default role adalah 'user'
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect('login')->with('success', 'Registration successful, please login');
    }

    // Proses logout
    public function logout()
    {
        // Hapus semua data user dari session
        Session::forget('user');
        return redirect('/');
    }
}