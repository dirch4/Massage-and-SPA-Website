<?php

namespace App\Http\Controllers;

use App\Models\karyawan;
use App\Models\Perawatan;
use Illuminate\Http\Request;

class UserController extends Controller
{
    function index(){
        $treatments = Perawatan::all();
        $karyawans = karyawan::all();
        return view('index', compact('treatments', 'karyawans'));
    }
}
