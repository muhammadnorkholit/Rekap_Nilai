<?php

namespace App\Imports;

use App\Models\jurusan;
use Maatwebsite\Excel\Concerns\ToModel;
use DB;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class JurusanImport implements ToModel,WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $count =  DB::table('jurusan')->where('jurusan',$row['jurusan'])->count();
        if($count >0)return;
        
        DB::table('jurusan')->insert([
            'jurusan'=>$row['jurusan']
        ]);
    }
}
