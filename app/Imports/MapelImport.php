<?php

namespace App\Imports;

use App\Models\mapel;
use Maatwebsite\Excel\Concerns\ToModel;

class MapelImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
       DB::table('mapel')->insert([
        'nama'=>$row[0],
       ]);
    }
}
