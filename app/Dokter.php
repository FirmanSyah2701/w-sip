<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Dokter extends Authenticatable
{
    use Notifiable;

    protected $table = 'dokter';
    protected $primaryKey = 'id_dokter';
    protected $fillable = 
    [
        'id_dokter', 
        'username',
        'nama_dokter', 
        'id_poli', 
        'jk', 
        'alamat', 
        'no_telp',
        'password',
        'foto'
    ];

    protected $hidden = [
        'password', 'remember_token'
    ];

    public $timestamps = false;

    public function setPasswordAttribute($value){
        $this->attributes['password'] = bcrypt($value);
    }

    public function poli(){
        return $this->belongsTo('App\Poli', 'id_poli');
    }

    public function antrian(){
        return $this->hasOne('App\Antrian', 'id_dokter');
    }

    public function konsul(){
        return $this->hasMany('App\Konsul', 'id_konsultasi');
    }

    public function rekamMedis(){
        return $this->hasOne('App\RekamMedis', 'id_dokter');
    }

}
