<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Konsul;
use App\Dokter;
use App\Poli;

class ConsultationController extends Controller
{
    public function index(Request $request){
        if(!$request->session()->exists('id_pasien')){
            return redirect()->route('loginPasien');
        }else{
            $dokter     = Dokter::all();
            $poli       = Poli::all(); 
            return view('pasien.konsultasi', compact('dokter', 'poli'));
        }
    }

    public function jawaban_konsul(){
        return view('pasien.jawaban_konsul');
    }

    public function store(Request $req){

        $data = array(
            'id_pasien'           => $req->id_pasien,
            'id_poli'             => $req->id_poli,
            'konsul_pasien'       => $req->konsul_pasien
        );

        Konsul::create($data);
        return redirect()->route('patientConsult')->with('success', 'Data Berhasil Ditambah');
    }
}
