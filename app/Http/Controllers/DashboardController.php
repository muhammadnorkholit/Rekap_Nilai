<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class DashboardController extends Controller
{
    public function index(Type $var = null)
    {
        $countSiswa = DB::table('siswa')->count();
        $countJurusan = DB::table('jurusan')->count();
        $countMapel = DB::table('mapel')->count();
        $countOperator = DB::table('users')->where('role','operator')->count();
        return view('admin.index',compact('countSiswa','countJurusan','countMapel','countOperator'));
    }
}
