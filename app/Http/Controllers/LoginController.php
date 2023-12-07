<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class LoginController extends Controller
{
    public function login()
    {
        if (Auth::check()) {
            return \view('dashboard.index');
        } else {
            return \view('login');
        }
    }

    public function actionLogin(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        $credentials = $request->only('email', 'password');
        // \dd($credentials);
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            Alert::success('Anda Berhasil Masuk');
            return \view('dashboard.index');
        } else {
            return \back()->with('warning', 'Email/Password Anda Salah!');
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->flush();
        $request->session()->regenerateToken();
        return \redirect('/');
    }
}
