<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RekamMedis extends Model
{
    protected $table = 'rekam_medis';
    protected $primaryKey = 'id_rekam_medis';
    protected $fillable = [
        'id_rekam_medis', 'id_pasien', 'id_dokter', 'id_poli', 'tanggal_berobat', 'keterangan'
    ];

    public $timestamps = false;

    public function dokter(){
        return $this->belongsTo('App\Dokter', 'id_dokter');
    }

    public function poli(){
        return $this->belongsTo('App\Poli', 'id_poli');
    }

    public function pasien(){
        return $this->belongsTo('App\Pasien', 'id_pasien');
    }
}
