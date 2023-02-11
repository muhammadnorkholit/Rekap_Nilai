<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rekap extends Model
{
    use HasFactory;
    protected $table = "rekap";
    protected $hidden = ['id_siswa','id_mapel','id_ajaran'];
    protected $fillable = ['id_siswa','id_mapel','id_ajaran','total_jawaban_b','total_jawaban_s','rata_rata'];


    public function Siswa()
    {
        return $this->belongsTo(Siswa::class,'id_siswa');
    }
    public function Mapel()
    {
        return $this->belongsTo(Mapel::class,'id_mapel');
    }
    public function TahunAjaran()
    {
        return $this->belongsTo(Tahun_Ajaran::class,'id_ajaran');
    }
}
