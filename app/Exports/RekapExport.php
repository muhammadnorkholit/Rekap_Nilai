<?php

namespace App\Exports;

use DB;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
class RekapExport  implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
  
    public function view(): View
    {
         $siswa = DB::table('siswa')->join("jurusan","siswa.id_jurusan","jurusan.id")->where("siswa.id",Request()->id)->first();
         $rekap = DB::table('data_rekap')
        ->where('kelas',$siswa->kelas)
        ->where('mapel',Request()->mapel)
        ->where('jurusan',$siswa->jurusan)
        ->where('no_kelas',$siswa->no_kelas)
        ->orderBy('nama','asc')->get();

          


        return  view('admin.export.rekap', compact('rekap'));
    }
}
