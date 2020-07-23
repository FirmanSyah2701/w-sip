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
        $data->username    = "mjoko123456"; 
        $data->nama_dokter = "Muhammad Joko";
        $data->id_poli     = 1;
        $data->jk          = "laki-laki";
        $data->no_telp     = "081201987586";
        $data->alamat      = "indrmayu";
        $data->password    = "mjoko123456";
        $data->save();
        
        //copy file to destination
        $toCopy     = public_path('/assets/img/dokter/'.$nama_file);
        File::copy($path, $toCopy);
        
        $this->assertDatabaseHas('dokter', [
            'id_dokter'     => $data->id_dokter,
            'foto'          => $data->foto,     
            'username'      => $data->username,     
            'nama_dokter'   => $data->nama_dokter, 
            'id_poli'       => $data->id_poli
        ]);
    }

    public function test_editProfile_notelp(){
        $param1     = 17;
        $param2     = '081922174396';
        $data       = ['no_telp' => $param2];

        Dokter::where('id_dokter', $param1)->update($data);

        $this->assertDatabaseHas('dokter', [
            'id_dokter'     => $param1,
            'no_telp'       => $param2
        ]);
    }
}
