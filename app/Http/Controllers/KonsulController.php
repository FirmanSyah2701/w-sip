<?php

namespace App\Http\Controllers;

use App\Poli;
use App\Dokter;
use App\Konsul;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class KonsulController extends Controller
{
    public function index(){
        if(!session()->exists('pasien')){
            return redirect()->route('loginPasien');
        }else{
            $dokter = Dokter::all();
            return view('pasien.konsultasi', compact('dokter'));
        }
    }

    public function konsulPasien(){
        if(!session()->exists('pasien')){
            return redirect()->route('loginPasien');
        }else{
            $konsul = Konsul::where('id_pasien', session('pasien'))->get();
            return view('pasien.jawaban_konsul', compact('konsul'))->with('i');
        }
    }

    public function store(Request $request){
        $validator = Validator::make($request->all(),[
            'id_dokter'       => 'required',
            'konsul_pasien'   => 'required',
        ], 
        [
            'id_dokter.required'     => 'Poli dan Dokter harus dipilih',
            'konsul_pasien.required' => 'Data konsultasi tidak boleh kosong',
        ]);

        if($validator->fails()) {
            return response()->json([
                'error'      => 1,
                'message1'   => $validator->errors()->get('id_dokter'),
                'message2'   => $validator->errors()->get('konsul_pasien')
            ], 200);
        }

        $poli = Dokter::where('id_dokter', $request->id_dokter)->value('id_poli');
        
        $data = [
            'id_pasien'      => session('pasien'),     
            'id_dokter'      => $request->id_dokter,
            'id_poli'        => $poli,
            'konsul_pasien'  => $request->konsul_pasien
        ];

        $create = Konsul::create($data);
        if($create){
            return response()->json([
                'error'   => 0,
                'message' => 'Data berhasil di tambahkan'
            ], 200);
        }
    }

    public function dataKonsul(){
        if(!session()->exists('dokter')){
            alert()->error('Kamu Harus Login Dulu!', 'Peringatan!');
            return redirect('/dokter/loginDokter');
        }else{
            $konsultasi  = Konsul::where('id_dokter', session('dokter'))->get();
    	    return view('dokter.dataKonsultasi',compact('konsultasi'));     
        }
    }

    public function ubah($id_konsultasi) {
        if(!session()->exists('dokter')){
            alert()->error('Kamu Harus Login Dulu!', 'Peringatan!');
            return redirect('/dokter/loginDokter');
        }else{
            $datas = Konsul::find($id_konsultasi);
            return view('dokter.BalasDokter',compact('datas'));
        }
    }

    public function update($id_konsultasi, Request $request) {
        $request->validate([
            'jawaban_dokter' => 'required'
        ],
        [
            'jawaban_dokter.required' => 'Jawaban tidak boleh kosong'
        ]);

        Konsul::where('id_konsultasi', $id_konsultasi)
            ->update($request->only('jawaban_dokter'));

        alert()->success('Jawaban Terkirim', 'Berhasil');
        return redirect('dokter/dataKonsultasi');
    }

    public function delete($id_antrian) {
        $datas = Konsul::find($id_antrian);
        $datas->delete();
        alert()->warning('Data Antrian Sudah Dihapus', 'Hapus');
        return redirect('dokter/dataKonsultasi');
    }
}
