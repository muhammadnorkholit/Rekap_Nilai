<?php

namespace App\Imports;

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
        if ($row['jurusan'] == null) {
            return;
        }
        $idJurusan = DB::table('jurusan')->where('jurusan',$row['jurusan'])->first();
        
        if($idJurusan == null);
        $nama = $row['nama']; 
        $nisn = $row['nisn']; 
        $no = $row['no_peserta']; 
        $noKelas = $row['no_kelas'];
        $kelas = $row['kelas'];
       

        if($idJurusan ==null){
        return;
        }
            DB::table('siswa')->insert([
                'nama'=>$nama,
                'nisn'=>$nisn,
                'no_peserta'=>$no,
                'id_jurusan'=>$idJurusan->id,
                'kelas'=>$kelas,
                'no_kelas'=>$noKelas
            ]);
    }
}
