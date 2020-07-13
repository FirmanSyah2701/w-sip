<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Antrian extends Model
{
    protected $table = 'antrian';
    protected $primaryKey = 'id_antrian';
    protected $fillable = [
        'id_antrian', 
        'no_antrian', 
        'tanggal', 
        'nama_pasien', 
        'jk', 
        'umur', 
        'no_telp', 
        'id_poli', 
        'id_dokter', 
        'status'
    ];
    
    public $timestamps = false;
    
    public function poli(){
        return $this->belongsTo('App\Poli', 'id_poli');
    }

    public function dokter(){
        return $this->belongsTo('App\Dokter', 'id_dokter');
    }
}
