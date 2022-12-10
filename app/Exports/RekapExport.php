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
         $rekap = DB::table('data_rekap')
            ->where('kelas',Request()->kelas)
            ->where('mapel',Request()->mapel)
            ->where('jurusan',Request()->jurusan)
            ->orderBy('nama','asc')
            ->get();
            if(Request()->has('nokelas')){
                $rekap ->where('no_kelas',Request()->nokelas);
            }

        return  view('admin.export.rekap', compact('rekap'));;
    }
}
