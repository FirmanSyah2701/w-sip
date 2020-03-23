<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Consult extends Model
{
    protected $table = 'consults';
    protected $primaryKey = 'consult_id';
    protected $fillable = [
        'name','consult_id', 'category_id', 'doctor_id', 'consult'
    ];

    public $timestamps = false;

    public function doctor(){
        return $this->belongsTo('App\Doctor', 'doctor_id');
    }

    public function category(){
        return $this->belongsTo('App\Category', 'category_id');
    }
}
