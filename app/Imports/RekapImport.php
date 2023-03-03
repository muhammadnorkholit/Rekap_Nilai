<?php

namespace App\Imports;

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

    private $totalRows = 0;
    private $totalRowsFail = 0;
    private $totalRowsSuccess = 0;
    private $message = "";

    public function model(array $row)
    {
        $this->totalRows++;
     
        if(!array_key_exists('skor',$row)){
            $this->message = "Format Excel Tidak Sesuai";
            return;
        }
        if(( $row['skor'] == null)){
            $this->totalRowsFail++;
            return ;
        }
        $mapel = DB::table('mapel')->where('id',Request()->mapel)->first();
        $siswa = DB::table('siswa')->where('no_peserta',$row['no_peserta'])->first();
        $count = DB::table('data_rekap')
        ->where('mapel',$mapel->mapel)
        ->where('no_peserta',$row['no_peserta'])
        ->whereMonth('tgl_rekap',date('m'))
        ->count();

        if($count > 0)return;
      
        $nilaiB  = $row['b'];
        $nilaiS  = $row['s'];
        $rata  = $row['skor'];
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
        $this->totalRowsSuccess++;
        DB::table('rekap')->insert([
            'id_mapel'=>$mapel->id,
            'id_siswa'=>$siswa->id,
            'total_jawaban_B'=>$nilaiB,
            'total_jawaban_S'=>$nilaiS,
            'rata_rata'=>$rata,
            'id_ajaran'=>$id_Ajaran
         ]);
    }
    public function rowsSuccess()
    {
        return $this->totalRowsSuccess;
    }
    public function totalRows()
    {
        return $this->totalRows;
    }
    public function rowsFail()
    {
        return $this->totalRowsFail;
    }
    public function getMessage()
    {
        if(!$this->message){
            return false;
        }
        return $this->message;
    }
}
