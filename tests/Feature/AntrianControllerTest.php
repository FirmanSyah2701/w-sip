<?php

namespace Tests\Feature;

use App\Antrian;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AntrianControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_store(){
        Antrian::create([
            'id_antrian'    => 1,
            'id_dokter'     => 16,
            'id_poli'       => 2,
            'nama_pasien'   => 'Firman Syah',
            'jk'            => 'laki-laki',
            'umur'          => 20,
            'no_telp'       => '08917293123',
            'tanggal'       => '2020-07-15',
            'status'        => 0
        ]);

        $this->assertDatabaseHas('antrian',[
            'id_antrian' => 1
        ]);
    }

    public function test_update_no_antrian(){
        Antrian::where('id_antrian', 1)->update([
            'no_antrian'   => 1,
            'status'       => 1
        ]);

        $this->assertDatabaseHas('antrian',[
            'id_antrian'    => 1,
            'no_antrian'   => 1,
            'status'       => 1
        ]);
    }
}
