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
        $siswa = DB::table('siswa')->where("id",Request()->id)->first();
        $rekap = DB::table('data_rekap')
        ->where('kelas',$siswa->kelas)
        ->where('mapel',Request()->mapel)
        ->where('jurusan',$siswa->id_jurusan)
        ->orderBy('nama','asc')->get();
      

        if (count($rekap) == 0) {
            return redirect()->back()->with('alert','Data Rekap Tidak Ditemukan');
        }
        dd($rekap);

        if (Request()->nokelas != null) {
        return Excel::download(new RekapExport, Request()->kelas."_".str_replace(" ","_",Request()->jurusan)."_".Request()->nokelas."_Mapel_".Request()->mapel.'.xlsx');
        }
        return Excel::download(new RekapExport, Request()->kelas."_".str_replace(" ","_",Request()->jurusan)."_Mapel_".Request()->mapel.'.xlsx');

    }
}
