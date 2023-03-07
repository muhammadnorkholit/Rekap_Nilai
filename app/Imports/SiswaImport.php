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

        if($idJurusan == null)return;
        $nama = $row['nama'];
        $nisn = $row['nisn'];
        $no = $row['no_peserta'];
        $noKelas = $row['no_kelas'];
        $kelas = $row['tingkatan'];


        if($idJurusan ==null){
        return;
        }
        $month = date('m');

        if($month <= '06'){
            $tahun = date('Y',strtotime("-1 Year"))."/".date('Y');;
            $semester = "ganjil";
        }else{
             $tahun = date('Y')."/".date('Y',strtotime("+1 year"));
            $semester = "genap";
        }

        $id_Ajaran = DB::table('tahun_ajaran')->where('tahun',$tahun)->where('semester',$semester)->first()->id;
        if(!$id_Ajaran)return;

            DB::table('siswa')->insert([
                'nama'=>$nama,
                'nisn'=>$nisn,
                'no_peserta'=>$no,
                'id_jurusan'=>$idJurusan->id,
                'tingkatan'=>$kelas,
                'no_kelas'=>$noKelas,
                'tahun_ajaran'=>$tahun
            ]);
    }
}
