<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRekamMedisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rekam_medis', function (Blueprint $table) {
            $table->increments('id_rekam_medis');
            $table->string('keterangan');
            $table->date('tanggal_berobat');
            $table->integer('id_pasien')->unsigned();
            $table->foreign('id_pasien')->references('id_pasien')->on('pasien');
            $table->integer('id_dokter')->unsigned();
            $table->foreign('id_dokter')->references('id_dokter')->on('dokter');
            $table->integer('id_poli')->unsigned();
            $table->foreign('id_poli')->references('id_poli')->on('poli');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rekam_medis');
    }
}
