<?php

namespace App\Imports;

use App\Models\rekap;
use Maatwebsite\Excel\Concerns\ToModel;
use DB;
class RekapImport implements ToModel
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
        $idSiswa = DB::table('siswa')->where('no_peserta',$row[1])->first();
        $nilaiB  = $row[2];
        $nilaiS  = $row[3];
        $rata  = $row[4];

        DB::table('rekap')->insert([
            'id_mapel'=>$idMapel->id,
            'id_siswa'=>$idSiswa->id,
            'total_nilai_B'=>$nilaiB,
            'total_nilai_S'=>$nilaiS,
            'rata_rata'=>$rata,
        ]);
    }
}
