<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Pasien extends Authenticatable
{
    use Notifiable;

    protected $table = 'pasien';
    protected $fillable = 
    [
        'id_pasien', 
        'username', 
        'nama_pasien', 
        'jk', 
        'umur', 
        'no_telp', 
        'alamat', 
        'password',
        'foto'
    ];

    protected $hidden = [
        'password', 'remember_token'
    ];

    protected $primaryKey = 'id_pasien';
    
    public $timestamps = false;
    
    public function setPasswordAttribute($value){
        $this->attributes['password'] = bcrypt($value);
    }

    public function rekam_medis(){
        return $this->hasOne('App\RekamMedis', 'id_pasien');
    }
}
