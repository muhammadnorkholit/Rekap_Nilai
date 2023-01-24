<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\RekapExport;
use DB;
class ExportController extends Controller
{
    public function exportRekap()
    {
        
        $siswa = DB::table('siswa')->join("jurusan","siswa.id_jurusan","jurusan.id")->where("siswa.id",Request()->id)->first();
         $rekap = DB::table('data_rekap')
        ->where('kelas',$siswa->kelas)
        ->where('mapel',Request()->mapel)
        ->where('jurusan',$siswa->jurusan)
        ->where('no_kelas',$siswa->no_kelas)
        ->orderBy('nama','asc')->get();
      


        if (count($rekap) == 0) {
            return redirect()->back()->with('alert','Data Rekap Tidak Ditemukan');
        }

        if ($siswa->no_kelas != null) {
        return Excel::download(new RekapExport, $siswa->kelas."_".str_replace(" ","_",$siswa->jurusan)."_".$siswa->no_kelas."_Mapel_".$rekap[0]->mapel.'.xlsx');
        }
        return Excel::download(new RekapExport, $siswa->kelas."_".str_replace(" ","_",$siswa->jurusan)."_Mapel_".$rekap[0]->mapel.'.xlsx');

    }
}
