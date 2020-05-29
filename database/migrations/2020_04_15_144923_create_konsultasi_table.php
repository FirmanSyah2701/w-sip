<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKonsultasiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('konsultasi', function (Blueprint $table) {
            $table->increments('id_konsultasi', 2);
            $table->integer('id_pasien')->unsigned();
            $table->foreign('id_pasien')->references('id_pasien')->on('pasien');
            $table->integer('id_dokter')->unsigned()->nullable();
            $table->foreign('id_dokter')->references('id_dokter')->on('dokter');
            $table->integer('id_poli')->unsigned();
            $table->foreign('id_poli')->references('id_poli')->on('poli');
            $table->string('konsul_pasien', 255);
            $table->string('jawaban_dokter', 255)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('konsultasi');
    }
}
