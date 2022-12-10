<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class DashboardController extends Controller
{
    public function index()
    {
        

        $countSiswa = DB::table('siswa')->count();
        $countJurusan = DB::table('jurusan')->count();
        $countMapel = DB::table('mapel')->count();
        $countOperator = DB::table('users')->where('role','operator')->count();

        // $rekapX = DB::table('data_rekap')
        // ->where('kelas','X')
        // ->whereMonth('tgl_rekap',date('m'));
        // $rekapXI = DB::table('data_rekap')
        // ->where('kelas','XI')
        // ->whereMonth('tgl_rekap',date('m'));
        // $rekapXII = DB::table('data_rekap')
        // ->where('kelas','XII')
        // ->whereMonth('tgl_rekap',date('m'));



        // $rekapDataX = $rekapX->get();
        // $rekapDataXI = $rekapXI->get();
        // $rekapDataXII = $rekapXII->get();


        // $rekapX->groupBy('jurusan');
        // $rekapX->groupBy('no_kelas');
        // $rekapXI->groupBy('jurusan');
        // $rekapXI->groupBy('no_kelas');
        // $rekapXI->groupBy('jurusan');
        // $rekapXI->groupBy('no_kelas');


        // $rekapGroupX = $rekapX->get();

        // $rekapArrayX = [];
        // $no = 1;
        // foreach ($rekapGroupX as $groupX ) {
        //     $dataArrayCurrent =[];
        //     foreach ($rekapDataX as $dataX) {
                
        //         if($dataX->jurusan == $groupX->jurusan && $dataX->no_kelas == $groupX->no_kelas){
        //             $dataArrayCurrent[]=$dataX;
        //         }
        //     }
        //     dd($dataArrayCurrent);
        //     $rekapArrayX[] = $dataArrayCurrent;

        // }

        //             dd($rekapDataX);



 
        
       
        return view('admin.index',compact('countSiswa','countJurusan','countMapel','countOperator'
        // ,'rekapX','rekapXI','rekapXII'
    ));
    }
}
