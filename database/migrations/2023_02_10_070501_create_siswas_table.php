<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSiswasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('siswa', function (Blueprint $table) {
            $table->id();
            $table->string('nama',50);
            $table->string('nisn',20);
            $table->integer('no_peserta');
            $table->enum('tingkatan',['X','XI','XII']);
            $table->enum('no_kelas',['1','2','3','4','5','6'])->nullable();
            $table->integer('id_jurusan')->unsigned();
            $table->year('tahun_ajaran');
            $table->timestamps();

            $table->foreign('id_jurusan')->references('id')->on('jurusan')->onUpdate('cascade')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('siswas');
    }
}
