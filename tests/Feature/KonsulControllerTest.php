<?php

namespace Tests\Feature;

use App\Pasien;
use App\Konsul;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class KonsulControllerTest extends TestCase
{
    /* public function test_store_valid()
    {
        $param1 = 15;
        $param2 = "Lorem ipsum dolor sit amet, consectetur adipisicing elit, 
                    sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. 
                    Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris 
                    nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor 
                    in reprehenderit in voluptate velit esse cillum 
                    dolore eu fugiat nulla pariatur. 
                    Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia 
                    deserunt mollit anim id est laborum.";

        $pasien = Pasien::where('id_pasien', 1)->value('id_pasien');
        $response = $this->post('AksiTambahDataKonsultasi',[
            'id_dokter'     => $param1,
            'konsul_pasien' => $param2,
        ]); 
        $data       = $response->getData();
        $expResult  = [0 => "Data berhasil di tambahkan"]; 

        $this->assertEquals($expResult, $data->message);
    } */

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
        $param1     = 1;
        $param2     = "Lorem ipsum dolor sit amet, consectetur adipisicing elit, 
                        sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. 
                        Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris 
                        nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor 
                        in reprehenderit in voluptate velit esse cillum 
                        dolore eu fugiat nulla pariatur. 
                        Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia 
                        deserunt mollit anim id est laborum.";
        
        Konsul::where('id_konsultasi', $param1)->update(['jawaban_dokter' => $param2]);
        
        $this->assertDatabaseHas('konsultasi', [
            'id_konsultasi'  => $param1,
            'jawaban_dokter' => $param2
        ]);
    } 
}
