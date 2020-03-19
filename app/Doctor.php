<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    protected $table = 'doctors';
    protected $primaryKey = 'doctor_id';
    protected $fillable = [
        'doctor_id', 'doctor_name', 'specialist'
    ];
    public $incrementing = false;
    public $timestamps = false;
}
