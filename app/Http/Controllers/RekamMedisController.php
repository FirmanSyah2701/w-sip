<?php

namespace App\Http\Controllers;

use App\RekamMedis;
use App\Dokter;
use App\Pasien;

use Illuminate\Http\Request;

class RekamMedisController extends Controller
{
     public function showMedisById(Request $request){
        if(!$request->session()->exists('pasien')){
            return redirect()->route('loginPasien');
        }else{
            $rMedis = RekamMedis::whereIdPasien(session('pasien'))->get();
            return view('pasien.rekam_medis', compact('rMedis'))->with('i');
        }
    }

    public function index(Request $request){
    	if(!$request->session()->exists('admin')){
            alert()->error('Kamu Harus Login Dulu!', 'Peringatan!');
            return redirect('/admin/loginAdmin');
        } else {
            $medis = RekamMedis::all();
    		return view('admin.rekamMedis', compact('medis'));
    	}
    }

    public function tambah(Request $request) {
        if(!$request->session()->exists('admin')){
            alert()->error('Kamu Harus Login Dulu!', 'Peringatan!');
            return redirect('/admin/loginAdmin');
        }else{
            $dokter = Dokter::all();
            $pasien = Pasien::all();
            return view('admin/TambahRekamMedis', compact('dokter','pasien'));
        }
    }

    public function store(Request $request) {
        $request->validate([
            'id_dokter'          => 'required',
            'tanggal_berobat'    => 'required',
            'id_pasien'          => 'required', 
            'keterangan'         => 'required'
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
    public  function tampil_data(Request $request){
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
        $this->validate($request, [
            'tanggal_berobat'  => 'required',
            'keterangan'       => 'required',
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

    public  function dataMedispasien(Request $request){
        if(!$request->session()->exists('dokter')){
            alert()->error('Kamu Harus Login Dulu!', 'Peringatan!');
            return redirect('/dokter/loginDokter');
        }else{
            $datas = RekamMedis::where('id_dokter', session('dokter'))
                        ->orderBy('tanggal_berobat', 'asc')->get();
            return view('dokter/dataMedisPasien',compact('datas'));    
        } 
    }

    public function lihatRekamMedis(Request $request, $id_rekam_medis) {
        if(!$request->session()->exists('dokter')){
            alert()->error('Kamu Harus Login Dulu!', 'Peringatan!');
            return redirect('/dokter/loginDokter');
        }else{
            $datas = RekamMedis::find($id_rekam_medis);
            return view('dokter/LihatRekamMedis',compact('datas'));
        }
    }
}
