<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AntrianTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testAmbilAntrian()
    {
        $response = $this->get('/pasien/ambil_antrian');
        
        $response->assertStatus(200);
    }
}
