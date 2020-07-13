<?php

namespace Tests\Feature;

Use App\Admin;
use App\Poli;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PoliControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_store()
    {
        $param  = 'Gigi';
        $poli   = new Poli();
        $poli->nama_poli = $param;
        $poli->save();
        $this->assertDatabaseHas('poli',[ 'nama_poli' => $param ]);
    }

    public function test_update(){
        $param1 = 'Gigi';
        $param2 = 'Jantung';
        $poli   = new Poli();
        $poli->nama_poli = $param1;
        $poli->save();
        
        $id_poli = Poli::where('nama_poli', $param1)->value('id_poli');
        $data    = Poli::find($id_poli);
        $data->nama_poli = $param2;
        $data->save();
        $this->assertDatabaseHas('poli',['nama_poli' => $param2]);
    }

    public function test_delete(){
        $param1 = 'Gigi';
        Poli::create(['nama_poli' => $param1]);
        $id_poli = Poli::where('nama_poli', $param1)->value('id_poli');
        $data    = Poli::find($id_poli);
        $data->delete();
        $this->assertDatabaseMissing('poli', ['id_poli' => $id_poli]);
    }
}
