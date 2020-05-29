<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Pasien extends Authenticatable
{
    use Notifiable;

    protected $table = 'pasien';
    protected $fillable = [
        'id_pasien', 'username', 'nama_pasien', 'alamat', 'password'
    ];

    protected $primaryKey = 'id_pasien';
    
    public $timestamps = false;
    
    protected $hidden = [
        'password', 'remember_token'
    ];

    public function setPasswordAttribute($value){
        $this->attributes['password'] = bcrypt($value);
    }
}
