<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $table = 'blog';
    protected $primaryKey = 'id_blog';
    protected $fillable = [
        'id_blog', 'foto', 'judul', 'slug', 'keterangan', 'tanggal'
    ];

}
