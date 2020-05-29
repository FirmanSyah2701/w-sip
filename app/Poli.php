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
    
}
