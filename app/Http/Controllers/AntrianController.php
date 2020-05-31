<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Antrian;
use App\Poli;
use App\Dokter;
use DB;
class AntrianController extends Controller
{

    public function create(Request $request){   
        if(!$request->session()->exists('id_pasien')){
            return redirect()->route('loginPasien');
        }else{
            $poli = Poli::all(); 
            return view('pasien.ambil_antrian', compact('poli'));
        }
    }

    public function store(Request $request){
        $dokter = DB::table('dokter')->where('id_poli', $request->id_poli)->get();
        $data = array(
            'id_poli'           => $request->id_poli,
            'no_antrian'        => null,
            'nama_pasien'       => $request->nama_pasien,
            'id_dokter'         => $dokter[0]->id_dokter
        );

        Antrian::create($data);
        return redirect()->route('ambilAntrian')->with('success', 'Data Berhasil Ditambah');    
    }

    public function show($name)
    {
        $antri = DB::table('antrian')->where('nama_pasien', $name)->get();
        $poli  = Poli::all();
        return view('pasien.lihat_antri', compact('antri', 'poli'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
