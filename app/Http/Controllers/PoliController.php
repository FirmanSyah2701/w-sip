<?php

namespace App\Http\Controllers;

use App\Poli;
use Illuminate\Http\Request;

class PoliController extends Controller
{
    public function index(Request $request){
        if(!$request->session()->exists('admin')){
            alert()->error('Kamu Harus Login Dulu!', 'Peringatan!');
            return redirect('/admin/loginAdmin');
        } else {
            return view('admin.poli');
        }
    }

    public function tambah(Request $request) {
        if(!$request->session()->exists('admin')){
            alert()->error('Kamu Harus Login Dulu!', 'Peringatan!');
            return redirect('/admin/loginAdmin');
        }else{
            return view('admin.TambahPoli');
        }
    }

    public function store(Request $request) {
        $request->validate([
            'nama_poli' => 'required', 
        ],
        [
            'nama_poli.required' => 'Nama Poli Belum Diisi', 
        ]);

        $data = new Poli();
        $data->nama_poli = $request->nama_poli;
        $data->save();
        alert()->success('Data Poli Berhasil Ditambah', 'Berhasil!');
        return redirect('admin/poli');
    }
    public  function tampil_data(Request $request){
        if(!$request->session()->exists('admin')){
            alert()->error('Kamu Harus Login Dulu!', 'Peringatan!');
            return redirect('/admin/loginAdmin');
        }else{
            $datas = Poli::all();         
            return view('admin.poli',compact('datas'));   
        }  

    }

    public function ubah(Request $request, $id_poli) {
        if(!$request->session()->exists('admin')){
            alert()->error('Kamu Harus Login Dulu!', 'Peringatan!');
            return redirect('/admin/loginAdmin');
        }else{
            $datas = Poli::find($id_poli);
            return view('admin.UbahPoli',compact('datas'));
        }
    }

    public function update($id_poli, Request $request) {
        $request->validate([
            'nama_poli' => 'required'
        ]);

        $data = Poli::find($id_poli);
        $data->nama_poli = $request->nama_poli;
        $data->save();
        alert()->success('Data Poli Berhasil Diubah', 'Berhasil!');
        return redirect('admin/poli');
    }

    public function delete($id_poli) {
        $datas = Poli::find($id_poli);
        $datas->delete();
        alert()->warning('Data Poli Berhasil Dihapus', 'Hapus!');
        return redirect('admin/poli');
    }
}
