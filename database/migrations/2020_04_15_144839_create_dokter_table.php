<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDokterTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dokter', function (Blueprint $table) {
            $table->increments('id_dokter', 12);
            $table->string('username', 50);
            $table->string('nama_dokter', 100);
            $table->integer('id_poli')->unsigned();
            $table->foreign('id_poli')->references('id_poli')->on('poli');
            $table->string('jk');
            $table->string('no_telp');
            $table->text('alamat');
            $table->string('foto')->nullable();
            $table->string('password');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dokter');
    }
}
