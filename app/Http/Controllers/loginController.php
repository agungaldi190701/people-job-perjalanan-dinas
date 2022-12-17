<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class logincontroller extends Controller
{

    public function index()
    {
        return view('content.login.login');
    }


    public function authenticate(Request $request)
    {
        // dd($request->all());

        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('/daftar-kegiatan')->with('success', 'Login Berhasil');
        }

        return back()->with('loginErorr', 'Login Failed!!');
    }

    public function logout()
    {
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();

        return redirect('/');
    }
}
