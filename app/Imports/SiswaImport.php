<?php

namespace App\Imports;

use App\Models\siswa;
use Maatwebsite\Excel\Concerns\ToModel;

class SiswaImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $nama = $row[0]; 
        $nisn = $row[1]; 
        $no = $row[2]; 
        $noKelas = $row[3]; 
        return new siswa([
            DB::table('siswa')->insert([
                'nama'=>$nama,
                'nisn'=>$nisn,
                'no_peserta'=>$no,
                'id_jurusan'=>$jurusan,
                'kelas'=>$kelas,
                'no_kelas'=>$noKelas
            ])
        ]);
    }
}
