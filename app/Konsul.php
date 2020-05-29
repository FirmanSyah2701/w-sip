<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Konsul extends Model
{
    protected $table = 'konsultasi';
    protected $primaryKey = 'id_konsultasi';
    protected $fillable = [
        'id_konsultasi', 'id_pasien', 'id_dokter', 'id_poli', 'konsul_pasien', 'jawaban_dokter'
    ];

    public $timestamps = false;

    public function dokter(){
        return $this->belongsTo('App\Dokter', 'id_dokter');
    }

    public function poli(){
        return $this->belongsTo('App\Poli', 'id_poli');
    }
}
