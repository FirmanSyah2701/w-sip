<?php

namespace App\Http\Controllers;

use App\Admin;
use Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
class DataAdminController extends Controller
{
    public function index(Request $request){
    	if(!$request->session()->exists('admin')){
            alert()->error('Kamu Harus Login Dulu!', 'Peringatan!');
            return redirect('/admin/loginAdmin');
        } else { 
    		return view('admin.dataAdmin');
    	}
    }

    public function tambah(Request $request){
        if(!$request->session()->exists('admin')){
            alert()->error('Kamu Harus Login Dulu!', 'Peringatan!');
            return redirect('/admin/loginAdmin');
        }else{
            return view('admin.TambahDataAdmin');
        }
    }

    public function store(Request $request) {
        $request->validate([
            'nama'       => 'required',
            'username'   => 'required',
            'password'   => 'required|min:8',
        ],
        [
            'nama.required'     => 'Nama Admin Belum Diisi',
            'username.required' => 'Username Belum Diisi', 
            'password.required' => 'Password Belum Diisi',
        ]);

        $data           = new Admin();
        $data->nama     = $request->nama;
        $data->username = $request->username;
        $data->password = $request->password;
        $data->save();
        alert()->success('Data Admin Sudah Ditambahkan', 'Berhasil');
        return redirect('admin/dataAdmin');
    }
    public  function tampil_data(Request $request){
        if(!$request->session()->exists('admin')){
            alert()->error('Kamu Harus Login Dulu!', 'Peringatan!');
            return redirect('/admin/loginAdmin');
        }else{
    	    $datas = Admin::all();         
            return view('admin.dataAdmin',compact('datas')); 
        }    
    }

    public function ubah(Request $request, $id) {
        if(!$request->session()->exists('admin')){
            alert()->error('Kamu Harus Login Dulu!', 'Peringatan!');
            return redirect('/admin/loginAdmin');
        }else{ 
            $datas = Admin::find($id);
            return view('admin/UbahDataAdmin',compact('datas'));
        }
    }

    public function update(Request $request, $id) {
        $request->validate([
            'nama'      => 'required',
            'username'  => 'required'
        ]);

        $data           = Admin::find($id);
        $data->nama     = $request->nama;
        $data->username = $request->username;
        $data->password = Hash::make($request->password);
        $data->save();
        alert()->success('Data Admin Sudah Diubah', 'Berhasil');
        return redirect('admin/dataAdmin');
    }

    public function delete($id) {
        $data = Admin::find($id);
        $data->delete();
        alert()->warning('Data Antrian Sudah Dihapus', 'Hapus');
        return redirect('admin/dataAdmin');
    }
}
