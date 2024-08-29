<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SesiController extends Controller
{
    function index()
    {
        echo view('sesi.login');
    }
    function login(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ],[
            'email.required' => 'Email wajib diisi',
            'password.required' => 'Password wajib diisi'
        ]);

        $infologin = [
            'email' => $request->email,
            'password' => $request->password
        ];

        if (Auth::attempt($infologin)) {
            if (Auth::user()->role == 'admin') {
                
                return redirect('/admin');
            } else if (Auth::user()->role == 'kayrawan') {
                // return redirect('');
                echo "Halaman Karyawan";
            }else {
                return redirect('/');
            }
        } else {
            return redirect('/login')->withErrors('Username dan password yang dimasukan tidak sesuai!')->withInput();
        }
    }
    function logout()
    {
        Auth::logout();
        return redirect('/');
    }

    function register()
    {
        return view('sesi.registrasi');
    }

    public function create(Request $request)
    {
        
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'no_telp' => 'required|numeric',
            'alamat' => 'required',
            'password' => 'required|min:8',
            'password_confirmation' => 'required|same:password'
        ],[
            'name.required' => 'Nama wajib diisi',
            'email.required' => 'Email wajib diisi',
            'email.email' => 'Email tidak valid',
            'email.unique' => 'Email sudah terdaftar',
            'no_telp.required' => 'No. Telp wajib diisi',
            'no_telp.numeric' => 'No. Telp harus berupa angka',
            'alamat.required' => 'Alamat wajib diisi',
            'password_confirmation.required' => 'Konfirmasi password wajib diisi',
            'password_confirmation.same' => 'Konfirmasi password tidak sama dengan password',
            'password.required' => 'Password wajib diisi',
            'password.min' => 'Password minimal 8 karakter'
        ]); 

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'no_telp' => $request->no_telp,
            'alamat' => $request->alamat,
            'password' => bcrypt($request->password),
            'role' => 'user'
        ];
        User::create($data);
        return redirect('/login')->with('pesan', 'Registrasi berhasil, silahkan login!');
    }
}
