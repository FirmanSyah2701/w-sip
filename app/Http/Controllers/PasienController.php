<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pasien;

class PasienController extends Controller
{
    public function showProfile(){
        $pasien = Pasien::all();
        return view('pasien.profile', compact('pasien'));
    }
}
