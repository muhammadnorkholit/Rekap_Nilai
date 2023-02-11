<?php

namespace App\Imports;

use App\Models\Jurusan;
use Maatwebsite\Excel\Concerns\ToModel;
use DB;
use Str;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class JurusanImport implements ToModel,WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function __construct(Type $var = null) {
        $this->error = false;
        $this->pesan = '';
    }
    public function model(array $row)
    {
        // mengecek apakah key jurusan ada

        try {
            $row['jurusan'];
        } catch (\Throwable $th) {
            $this->error = true;
            $this->pesan = "Format excel tidak sesuai";

            return ;
        }


        $count =  DB::table('jurusan')->where('jurusan',$row['jurusan'])->count();
        if($count >0)return;
        
        Jurusan::create([
            'jurusan'=>Str::upper($row['jurusan'])
        ]);
    }

    public function ambilPesan()
    {
        return $this->pesan;
    }
}
