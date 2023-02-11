<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;
    protected $table = "siswa";
    protected $fillable = ['nama','nisn','no_peserta','tingkatan','no_kelas','id_jurusan','tahun_ajaran'];
    protected $hidden = ['id_jurusan'];
}
