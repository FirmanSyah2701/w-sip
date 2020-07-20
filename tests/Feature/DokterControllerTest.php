<?php

namespace Tests\Feature;

use File;
use App\Dokter;
use Tests\TestCase;
use Illuminate\Http\UploadedFile;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class DokterControllerTest extends TestCase
{
    public function test_store()
    {
        $path           = storage_path('testing/dokter.png');
        $originalName   = "dokter.png";
        $mime           = 'img/png';
        $file           = new UploadedFile($path, $originalName, 0, null, true);
        $nama_file      = time()."_".$file->getClientOriginalName();

        $data              = new Dokter();
        $data->foto        = $nama_file;
        $data->username    = "anu123"; 
        $data->nama_dokter = "sianu";
        $data->id_poli     = 1;
        $data->jk          = "laki-laki";
        $data->no_telp     = "0897123091";
        $data->alamat      = "indrmayu";
        $data->password    = "anu123";
        
        $data->save();
        
        //copy file to destination
        $toCopy     = public_path('/assets/img/dokter/'.$nama_file);
        File::copy($path, $toCopy);

        $dokter = Dokter::where('username', 'anu123')->first();
        
        $this->assertDatabaseHas('dokter', [
            'id_dokter'  => $dokter->id_dokter
        ]);
    }

    public function test_editProfile(){
        $id   = 10;
        $data = [
            'username'      => 'riyannto123',
            'nama_dokter'   => 'riyantoYusufWijaya',
            'no_telp'       => '08123910123',
        ];

        Dokter::where('id_dokter', $id)->update($data);

        $this->assertDatabaseHas('dokter', [
            'id_dokter'     => $id,
            'username'      => 'riyannto123'
        ]);
    }
}
