<?php

namespace App\Http\Controllers;

use App\Dokter;
use App\Konsul;
use App\Poli;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class KonsulController extends Controller
{
    public function index(Request $request){
        if(!$request->session()->exists('pasien')){
            return redirect()->route('loginPasien');
        }else{
            $dokter = Dokter::all();
            return view('pasien.konsultasi', compact('dokter'));
        }
    }

    public function jawaban_konsul(Request $request){
        if(!$request->session()->exists('pasien')){
            return redirect()->route('loginPasien');
        }else{
            $konsul = Konsul::where('id_pasien', session('pasien'))->first();
            return view('pasien.jawaban_konsul', compact('konsul'))->with('i');
        }
    }

    public function store(Request $request){

        $validator = Validator::make($request->all(),[
            'id_dokter'       => 'required',
            'konsul_pasien'   => 'required|max:255',
        ], 
        [
            'id_dokter.required'     => 'Poli dan Dokter harus dipilih',
            'konsul_pasien.required' => 'Data konsultasi tidak boleh kosong',
            'konsul_pasien.max'      => 'panjang kata tidak boleh lebih dari 255'
        ]);

        if($validator->fails()) {
            return response()->json([
                'error'      => 1,
                'message'    => $validator->errors()->get('id_dokter') +
                                '<br> dan <br>' + $validator->errors()->get('konsul_pasien')
            ], 200);
        }

        $poli = Dokter::whereIdPoli($request->id_dokter)->value('id_poli');

        $data = array(
            'id_pasien'      => session('pasien'),
            'id_poli'        => $poli,     
            'id_dokter'      => $request->id_dokter,
            'konsul_pasien'  => $request->konsul_pasien
        );

        $konsul = Konsul::create($data);
        if($konsul){
            return response()->json([
                'error'   => 0,
                'message' => 'Data berhasil di tambahkan'
            ], 200);
        }
    }

    public function tampil_data(Request $request){
        if(!$request->session()->exists('dokter')){
            alert()->error('Kamu Harus Login Dulu!', 'Peringatan!');
            return redirect('/dokter/loginDokter');
        }else{
            $konsultasi  = Konsul::where('id_dokter', session('dokter'))->get();
    	    return view('dokter/dataKonsultasi',compact('konsultasi'));     
        }
    }

    public function ubah(Request $request, $id_konsultasi) {
        if(!$request->session()->exists('dokter')){
            alert()->error('Kamu Harus Login Dulu!', 'Peringatan!');
            return redirect('/dokter/loginDokter');
        }else{
            $datas = Konsultasi::find($id_konsultasi);
            return view('dokter/BalasDokter',compact('datas'));
        }
    }

    public function update($id_konsultasi, Request $request) {
        $this->validate($request, [
            'jawaban_dokter' => 'required'
        ],
        [
            'jawaban_dokter.required' => 'Balas Terlebih Dahulu'
        ]);

        $data = KonsultasiModel::find($id_konsultasi);
        
        $data->jawaban_dokter = $request->jawaban_dokter;
        $data->save();
        alert()->success('Jawaban Terkirim', 'Berhasil');
        return redirect('dokter/dataKonsultasi');
    }

    public function delete($id_antrian) {
        $datas = Konsultasi::find($id_antrian);
        $datas->delete();
        alert()->warning('Data Antrian Sudah Dihapus', 'Hapus');
        return redirect('dokter/dataKonsultasi');
    }

    public function detailAntrian(Request $request, $id_antrian) {
        if(!$request->session()->exists('dokter')){
            alert()->error('Kamu Harus Login Dulu!', 'Peringatan!');
            return redirect('/dokter/loginDokter');
        }else{
            $datas = Konsultasi::find($id_antrian);
            return view('admin/detailDataAntrian',compact('datas'));
        }
    }
}
