<?php

namespace App\Http\Controllers;

use App\Dokter;
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
        return view('layouts.pesan_antrian', compact('dokter'));
    }
}
