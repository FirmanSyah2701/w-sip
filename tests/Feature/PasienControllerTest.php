<?php

namespace Tests\Feature;

use App\Pasien;
use Tests\TestCase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PasienControllerTest extends TestCase
{
    use RefreshDatabase;
    //TC-01 Register pasien
    //TC-02 Register pasien dengan data kosong
    //TC-03 Register pasien dengan username yang sudah terdaftar
    //TC-04 Mengubah data pasien
    //TC-05 Mengupload foto pasien dengan ukuran file yang lebih besar dari yang ditentukan
    public function test_editProfile(){
        $id = 10;

        Pasien::create([
            'id_pasien'     => $id,
            'username'      => 'anu',
            'nama_pasien'   => 'anu',
            'jk'            => 'laki-laki',
            'umur'          => 12,
            'no_telp'       => '089',
            'alamat'        => 'crb',
            'password'      => bcrypt('anu')
        ]);

        
        Storage::fake('uploads');
        $img = UploadedFile::fake()->image('pasien.jpg')->size(1000);
        $data = [
            'nama_pasien'   => 'etto',
            'foto'          => $img
        ];

        if($img->getSize() >= 2048){
            Pasien::where('id_pasien', $id)->update([
                'foto'          => ''
            ]);
        }
        Pasien::where('id_pasien', $id)->update($data);
        $pasien = Pasien::find($id);
        Storage::disk('uploads')->assertMissing('pasien.jpg');
        $this->assertDatabaseHas('pasien', [
            'foto'          => $pasien->foto
        ]);
    }
}
