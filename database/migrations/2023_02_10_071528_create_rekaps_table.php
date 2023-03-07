<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRekapsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rekap', function (Blueprint $table) {
            $table->id();
            $table->integer('id_mapel')->unsigned();
            $table->bigInteger('id_siswa')->unsigned();
            $table->integer('id_ajaran')->unsigned();
            $table->integer('id_jenis')->unsigned();
            $table->integer('total_jawaban_b');
            $table->integer('total_jawaban_s');
            $table->integer('rata_rata');
            $table->timestamps();

            $table->foreign('id_jenis')->references('id')->on('jenis_ujian')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('id_siswa')->references('id')->on('siswa')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('id_ajaran')->references('id')->on('tahun_ajaran')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('id_mapel')->references('id')->on('mapel')->onUpdate('cascade')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rekaps');
    }
}
