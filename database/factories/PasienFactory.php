<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Pasien;
use Faker\Generator as Faker;

$factory->define(Pasien::class, function (Faker $faker) {
    return [
        'username'      => $faker->text,
        'nama_pasien'   => $faker->text,
        'password'      => $faker->text,
        'jk'            => $faker->text,
        'umur'          => $faker->text,
        'no_telp'       => $faker->text,
        'alamat'        => $faker->text
    ];
});
