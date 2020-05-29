<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dokter extends Model
{
    protected $table = 'dokter';
    protected $primaryKey = 'id_dokter';
    protected $fillable = [
        'id_dokter', 'nama_dokter', 'poli'
    ];

    public $timestamps = false;

    public function poli(){
        return $this->belongsTo('App\Poli', 'id_poli');
    }
}
