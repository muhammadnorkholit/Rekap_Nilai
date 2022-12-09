<?php

namespace App\Imports;

use App\Models\mapel;
use Maatwebsite\Excel\Concerns\ToModel;
use DB;
use Str;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class MapelImport implements ToModel,WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */

    public function __construct(Type $var = null) {
        $this->no = 1;
    }
    public function model(array $row)
    {
            $this->no++;

        if($row['no'] == null || $row['mapel'] == null)return;
        
        $count = DB::table('mapel')->where('mapel',$row['mapel'])->count();

        if($count > 0)return;
        DB::table('mapel')->insert([
            'mapel'=>Str::upper($row['mapel']),
            'kode_mapel'=>$row['kode_mapel']
        ]);
        // dd($row[1]);
    }
}
