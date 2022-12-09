<?php

namespace App\Imports;

use App\Models\siswa;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use DB;
class SiswaImport implements ToModel,WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $nama = $row['nama']; 
        $nisn = $row['nisn']; 
        $no = $row['no peserta']; 
        $noKelas = $row['no kelas'];
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
