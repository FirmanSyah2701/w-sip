<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Poli extends Model
{
    protected $table = 'poli';
    protected $primaryKey = 'id_poli';
    protected $fillable = [
        'id_poli', 'nama_poli'    
    ];

    public $timestamps = false;
    
    public function dokter(){
        return $this->hasOne('App\Dokter', 'id_poli');
    }
    
    public function antrian(){
        return $this->hasOne('App\Antrian', 'id_poli');
    }

    public function konsul(){
        return $this->hasMany('App\Konsul', 'id_konsultasi');
    }

    public function rekam_medis(){
        return $this->hasOne('App\RekamMedis', 'id_poli');
    }
}
