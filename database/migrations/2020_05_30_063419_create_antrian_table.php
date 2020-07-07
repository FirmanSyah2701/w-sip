<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAntrianTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('antrian', function (Blueprint $table) {
            $table->increments('id_antrian');
            $table->integer('no_antrian')->nullable();
            $table->string('nama_pasien');
            $table->date('tanggal');
            $table->string('jk', 20);
            $table->integer('umur')->length(3);
            $table->string('no_telp', 15);
            $table->integer('status');
            $table->integer('id_poli')->unsigned();
            $table->foreign('id_poli')->references('id_poli')->on('poli');
            $table->integer('id_dokter')->unsigned()->nullable();
            $table->foreign('id_dokter')->references('id_dokter')->on('dokter');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('antrian');
    }
}
