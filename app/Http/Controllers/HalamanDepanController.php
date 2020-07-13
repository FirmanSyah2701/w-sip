<?php

namespace App\Http\Controllers;

use App\Dokter;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HalamanDepanController extends Controller
{
    public function index()
    {
        $dokter = Dokter::paginate(10);
        return view('layouts.doctor', compact('dokter'));
    }

    public function showPesanAntrian(){
        $dokter = Dokter::all();
        $now    = Carbon::today()->toDateString();
        return view('layouts.pesan_antrian', compact('dokter', 'now'));
    }
}
