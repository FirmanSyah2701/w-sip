<?php

namespace App\Http\Controllers;

use App\Poli;
use Illuminate\Http\Request;

class PoliController extends Controller
{

    public function tambah() {
        if(!session()->exists('admin')){
            alert()->error('Kamu Harus Login Dulu!', 'Peringatan!');
            return redirect('/admin/loginAdmin');
        }else{
            return view('admin.TambahPoli');
        }
    }

    public function store(Request $request) {
        $request->validate([
            'nama_poli' => 'required|unique:poli|string|max:100|regex:/^[a-zA-Z\s]*$/', 
        ],
        [
            'nama_poli.required'    => 'Nama poli harus diisi',
            'nama_poli.unique'      => 'Nama poli sudah ada', 
            'nama_poli.max'         => 'Nama poli panjang karakter maksima 100',
            'nama_poli.regex'       => 'Nama poli harus diisi dengan huruf'
        ]);

        Poli::create($request->only('nama_poli'));
        
        alert()->success('Data Poli Berhasil Ditambah', 'Berhasil!');
        return redirect('admin/poli');
    }
    
    public function dataPoli(){
        if(!session()->exists('admin')){
            alert()->error('Kamu Harus Login Dulu!', 'Peringatan!');
            return redirect('/admin/loginAdmin');
        }else{
            $datas = Poli::all();         
            return view('admin.poli',compact('datas'));   
        }  
    }

    public function ubah($id_poli) {
        if(!session()->exists('admin')){
            alert()->error('Kamu Harus Login Dulu!', 'Peringatan!');
            return redirect('/admin/loginAdmin');
        }else{
            $datas = Poli::find($id_poli);
            return view('admin.UbahPoli',compact('datas'));
        }
    }

    public function update($id_poli, Request $request) {
        $request->validate([
            'nama_poli' => 'required|string|max:100|regex:/^[a-zA-Z\s]*$/', 
        ],
        [
            'nama_poli.required'    => 'Nama poli harus diisi', 
            'nama_poli.max'         => 'Nama poli panjang karakter maksima 100',
            'nama_poli.regex'       => 'Nama poli harus diisi dengan huruf'
        ]);
        
        Poli::whrere($id_poli)->update($request->only('nama_poli'));
        alert()->success('Data Poli Berhasil Diubah', 'Berhasil!');
        return redirect('admin/poli');
    }

    public function delete($id_poli) {
        try {
            $datas = Poli::find($id_poli);
            $datas->delete();
            alert()->warning('Data Poli Berhasil Dihapus', 'Hapus!');
            return redirect('admin/poli');
        } catch (\Throwable $th) {
            return redirect()->back()->withErrors('Data gagal dihapus');
        }
    }
}
