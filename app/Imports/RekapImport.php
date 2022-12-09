<?php

namespace App\Imports;

use App\Models\rekap;
use Maatwebsite\Excel\Concerns\ToModel;
use DB;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class RekapImport implements ToModel,WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */

   public function __construct($idMapel) {
    $this->idmapel = $idMapel;
   }

    public function model(array $row)
    {

         $idMapel = DB::table('mapel')->where('id',$this->idmapel)->first('id');
        $idSiswa = DB::table('siswa')->where('no_peserta',$row['no_peserta'])->first();
        $nilaiB  = $row['b'];
        $nilaiS  = $row['s'];
        $rata  = $row['Skor'];

        DB::table('rekap')->insert([
            'id_mapel'=>$idMapel->id,
            'id_siswa'=>$idSiswa->id,
            'total_nilai_B'=>$nilaiB,
            'total_nilai_S'=>$nilaiS,
            'rata_rata'=>$rata,
        ]);
    }
}
