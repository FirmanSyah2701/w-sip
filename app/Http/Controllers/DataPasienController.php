<?php

namespace App\Http\Controllers;

use App\Pasien;
use App\Poli;
use Illuminate\Http\Request;

class DataPasienController extends Controller
{
    public function index(Request $request){
        if(!$request->session()->exists('admin')){
            alert()->error('Kamu Harus Login Dulu!', 'Peringatan!');
            return redirect('/admin/loginAdmin');
        } else {
            return view('admin.dataPasien');
        }
    }

    public function tambah(Request $request) {
        if(!$request->session()->exists('admin')){
            alert()->error('Kamu Harus Login Dulu!', 'Peringatan!');
            return redirect('/admin/loginAdmin');
        }else{
            return view('admin.TambahDataPasien');
        }
    }

    public function store(Request $request) {
        $this->validate($request, [
            'nama_pasien' => 'required',
            'username' => 'required',
            'alamat' => 'required',
        ],[
            'nama_pasien.required' => 'Nama Pasien Belum Diisi',
            'username.required' => 'Username Belum Diisi',
            'alamat.required' => 'Alamat Belum Diisi',
        ]);

        $data = new Pasien();
        $data->nama_pasien = $request->nama_pasien;
        $data->username    = $request->username;
        $data->jk          = $request->jk;
        $data->umur        = $request->umur;
        $data->no_telp     = $request->no_telp;
        $data->alamat      = $request->alamat;
        $data->password    = $request->password;
        $data->save();

        alert()->success('Data Pasien Berhasil Ditambah', 'Berhasil!');
        return redirect('admin/dataPasien');
    }
    public  function tampil_data(Request $request){
        if(!$request->session()->exists('admin')){
            alert()->error('Kamu Harus Login Dulu!', 'Peringatan!');
            return redirect('/admin/loginAdmin');
        }else{
            $datas = Pasien::all();         
            return view('admin/dataPasien',compact('datas'));     
        }
    }

    public function ubah(Request $request, $id_pasien) {
        if(!$request->session()->exists('admin')){
            alert()->error('Kamu Harus Login Dulu!', 'Peringatan!');
            return redirect('/admin/loginAdmin');
        }else{
            $datas = Pasien::find($id_pasien);
            $poli  = Poli::all();
            return view('admin/UbahDataPasien',compact('datas','poli'));
        }
    }

    public function update($id_pasien, Request $request) {
        $this->validate($request, [
            'nama_pasien' => 'required',
            'username' => 'required',
            'alamat' => 'required'
        ]);

        $data = Pasien::find($id_pasien);
        $data->nama_pasien  = $request->nama_pasien;
        $data->username     = $request->username;
        $data->umur         = $request->umur;
        $data->no_telp      = $request->no_telp;
        $data->alamat       = $request->alamat;
        //$data->password     = $request->password;
        
        $data->save();
        alert()->success('Data Pasien Berhasil Diubah', 'Berhasil!');
        return redirect('admin/dataPasien');
    }

    public function delete($id_pasien) {
        $datas = Pasien::find($id_pasien);
        $datas->delete();
        alert()->warning('Data Pasien Berhasil Dihapus', 'Hapus!');
        return redirect('admin/dataPasien');
    }

    public  function datapasien(Request $request){
        if(!$request->session()->exists('dokter')){
            alert()->error('Kamu Harus Login Dulu!', 'Peringatan!');
            return redirect('/dokter/loginDokter');
        }else{
            $datas = Pasien::all();  
            return view('dokter/dataDiriPasien',compact('datas'));    
        } 
    }
}
