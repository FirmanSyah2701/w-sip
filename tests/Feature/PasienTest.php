<?php

namespace Tests\Feature;

use App\Pasien;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PasienTest extends TestCase
{
    use RefreshDatabase;
    public function testShowProfile()
    {
        $username = 'firmansyah';
        $name     = 'Firman Syah';
        $address  = 'Cirebon';
        $pasien = factory(Pasien::class)->create([
            'username'      => $username,
            'nama_pasien'   => $name,
            'password'      => bcrypt('firmansyah'),
            'jk'            => 'laki-laki',
            'umur'          => 20,
            'no_telp'       => '083',
            'alamat'        => $address,
        ]);
        
        $this->actingAs($pasien);

        $this->visit('/profile/pasien');

        $this->seeText($username);
        $this->seeText($name);
        $this->seeText($address);
    }
}
