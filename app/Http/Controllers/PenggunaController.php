<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class PenggunaController extends Controller
{
    public function index()
    {
        return view('pengguna.registrasi');
    }

    public function simpanRegistrasi(Request $request)
    {


        $messages = [
            'required' => ':attribute wajib diisi guys!',
            'min'      => ':attribute ini harus diisi minimal :min karakternya ya',
            'max'      => ':attribute ini harus diisi maksimal :max karakternya ya',
        ];

        $request->validate([
            'name'      => 'required|string|max:255',
            'email'     => 'required|string|email|max:255|unique:users',
            'password'  => 'required|string|min:8|confirmed',
        ], $messages);

        User::create([
            'name'      => $request->name,
            'email'     => $request->email,
            'password'  => Hash::make($request->password),
        ]);

        // Auto-login after registration
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect()->route('formulir.user')->with('success', 'Registrasi Berhasil, silahkan isi formulir pendaftaran');
        }

        return redirect()->route('login')->with('success', 'Registrasi Berhasil, silahkan login');
    }


    public function loginForm()
    {
        return view('pengguna.login');
    }

    public function login(Request $request)
    {
        $messages = [
            'required'  => ':attribute wajib diisi guys!!!',
            'max'       => ':attribute harus diisi minimal :min karakter ya!!!',
            'min'       => ':attribute harus diisi maksimal :max karakter ya!!!',
        ];

        $request->validate([
            'email'     => 'required|string|email',
            'password'  => 'required|string',
        ], $messages);

        if (Auth::attempt($request->only('email', 'password'))) {
            if (Auth::user()->role == 'admin') {
                return redirect()->route('dashboard.admin');
            }
            return redirect()->route('formulir.user')->with('succes', 'Selamat Anda telah berhasil login');
        }

        return back()->withErrors(['Email atau password tidak sesuai.']);
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login')->with('succes', 'Logout Berhasil.');
    }

    public function profile()
    {

        $users =
            Auth::user();

        return view('pengguna.profile', compact('users'));
    }
}
