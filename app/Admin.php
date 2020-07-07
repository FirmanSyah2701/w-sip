<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    use Notifiable;

    protected $table = 'admin';
    
    protected $fillable = [
        'id_admin', 'username', 'nama', 'password',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $primaryKey = 'id_admin';

    public $timestamps = false;

    public function setPasswordAttribute($value){
        $this->attributes['password'] = bcrypt($value);
    }
}
