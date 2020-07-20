<?php

namespace Tests\Feature;

use App\Konsul;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class KonsulControllerTest extends TestCase
{
    public function test_store_valid()
    {
        $response = $this->post('AksiTambahDataKonsultasi',[
            'id_dokter'     => 1,
            'konsul_pasien' => 'anu',
        ]);
        $data       = $response->getData();
        $expResult  = [0 => "Data berhasil di tambahkan"];

        $this->assertEquals($expResult, $data->message);
    }

    public function test_store_data_empety()
    {
        $response = $this->post('AksiTambahDataKonsultasi',[
            'id_dokter'     => '',
            'konsul_pasien' => '',
        ]);

        $data       = $response->getData();
        $expResult1 = [0 => "Poli dan Dokter harus dipilih" ];
        $expResult2 = [0 => "Data konsultasi tidak boleh kosong"];

        $this->assertEquals($expResult1, $data->message1);
        $this->assertEquals($expResult2, $data->message2);
    }

    public function test_reply(){
        $id     = 1;
        $param  = "Wis kalem bae nang";
        $data   = Konsul::find($id);
        $data->jawaban_dokter = $param;
        $data->save();
        
        $this->assertDatabaseHas('konsultasi', [
            'id_konsultasi'  => $id,
            'jawaban_dokter' => $param 
        ]);
    }
}
