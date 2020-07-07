<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ChartPasien extends Model
{
    protected $table        = "chart_pasien";
    protected $primaryKey   = "id_chart_pasien";
    protected $fillable     = [
        'id_chart_pasien', 'jml_antrian', 'tanggal'
    ];

    public $timestamps = false;
}
