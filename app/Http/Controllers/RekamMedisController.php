<?php

namespace App\Http\Controllers;

use App\Dokter;
use App\Pasien;
use App\RekamMedis;
use Carbon\Carbon;

use Illuminate\Http\Request;

class RekamMedisController extends Controller
{
     public function showMedisByPatient(){
        if(!session()->exists('pasien')){
            return redirect()->route('loginPasien');
        }else{
            $rMedis = RekamMedis::where('id_pasien', session('pasien'))->get();
            return view('pasien.rekam_medis', compact('rMedis'))->with('i');
        }
    }

    public function tambah() {
        if(!session()->exists('admin')){
            alert()->error('Kamu Harus Login Dulu!', 'Peringatan!');
            return redirect('/admin/loginAdmin');
        }else{
            $dokter = Dokter::all();
            $pasien = Pasien::all();
            $now    = Carbon::today()->toDateString();
            return view('admin.TambahRekamMedis', compact('now','dokter','pasien'));
        }
    }

    public function store(Request $request) {
        $request->validate([
            'id_dokter'          => 'required',
            'tanggal_berobat'    => 'required|date|before:tomorrow',
            'id_pasien'          => 'required', 
            'keterangan'         => 'required|string'
        ],
        [
            'id_dokter.required'        => 'Poli dan dokter harus diisi',
            'tanggal_berobat.required'  => 'Tanggal harus diisi',
            'tanggal_berobat.before'    => 'Tanggal tidak boleh diisi hari ini atau seterusnya',
            'id_pasien.required'        => 'Nama pasien harus diisi',
            'keterangan.required'       => 'Keterangan harus diisi'
        ]); 

        $poli = Dokter::where('id_dokter', $request->id_dokter)->value('id_poli');
        $data = new RekamMedis();
        $data->id_dokter          = $request->id_dokter;
        $data->id_poli            = $poli;
        $data->tanggal_berobat    = $request->tanggal_berobat;
        $data->id_pasien          = $request->id_pasien;
        $data->keterangan         = $request->keterangan;
        $data->save();
        alert()->success('Data Rekam Medis Berhasil Ditambah', 'Berhasil!');
        return redirect('admin/rekamMedis');
    }
    public function dataMedis(Request $request){
        if(!$request->session()->exists('admin')){
            alert()->error('Kamu Harus Login Dulu!', 'Peringatan!');
            return redirect('/admin/loginAdmin');
        }else{
    	    $datas = RekamMedis::all()->sortBy('id_poli');         
            return view('admin/rekamMedis',compact('datas'));  
        } 
    }

    public function ubah(Request $request, $id_rekam_medis) {
        if(!$request->session()->exists('admin')){
            alert()->error('Kamu Harus Login Dulu!', 'Peringatan!');
            return redirect('/admin/loginAdmin');
        }else{
            $datas = RekamMedis::find($id_rekam_medis);
            $dokter = Dokter::all();
            $pasien = Pasien::all();
            return view('admin/UbahRekamMedis',compact('datas','dokter','pasien'));
        }
    }

    public function update($id_rekam_medis, Request $request) {
        $request->validate([
            'id_dokter'          => 'required',
            'tanggal_berobat'    => 'required|date|before:tomorrow',
            'id_pasien'          => 'required', 
            'keterangan'         => 'required|string'
        ],
        [
            'id_dokter.required'        => 'Poli dan dokter harus diisi',
            'tanggal_berobat.required'  => 'Tanggal harus diisi',
            'tanggal_berobat.before'    => 'Tanggal tidak boleh diisi hari ini atau seterusnya',
            'id_pasien.required'        => 'Nama pasien harus diisi',
            'keterangan.required'       => 'Keterangan harus diisi'
        ]);

        $poli = Dokter::where('id_dokter', $request->id_dokter)->value('id_poli');

        $data                  = RekamMedis::find($id_rekam_medis);
        $data->id_dokter       = $request->id_dokter;
        $data->id_poli         = $poli;
        $data->tanggal_berobat = $request->tanggal_berobat;
        $data->id_pasien       = $request->id_pasien;
        $data->keterangan      = $request->keterangan;
        
        $data->update();
        alert()->success('Data Rekam Medis Berhasil Diubah', 'Berhasil!');
        return redirect('admin/rekamMedis');
    }

    public function delete($id_rekam_medis) {
        $datas = RekamMedis::find($id_rekam_medis);
        $datas->delete();
        alert()->warning('Data Pasien Berhasil Dihapus', 'Hapus!');
        return redirect('admin/rekamMedis');
    }

    public function dataMedisbyDokter(){
        if(!session()->exists('dokter')){
            alert()->error('Kamu Harus Login Dulu!', 'Peringatan!');
            return redirect('/dokter/loginDokter');
        }else{
            $datas = RekamMedis::where('id_dokter', session('dokter'))
                        ->orderBy('tanggal_berobat', 'asc')->get();
            return view('dokter/dataMedisPasien',compact('datas'));    
        } 
    }

    public function lihatRekamMedis($id_rekam_medis) {
        if(!session()->exists('dokter')){
            alert()->error('Kamu Harus Login Dulu!', 'Peringatan!');
            return redirect('/dokter/loginDokter');
        }else{
            $datas = RekamMedis::find($id_rekam_medis);
            return view('dokter.LihatRekamMedis',compact('datas'));
        }
    }
}
