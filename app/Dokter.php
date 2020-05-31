<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dokter extends Model
{
    protected $table = 'dokter';
    protected $primaryKey = 'id_dokter';
    protected $fillable = 
    [
        'id_dokter', 
        'nama_dokter', 
        'poli', 
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
}
