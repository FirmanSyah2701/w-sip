<?php

namespace App\Http\Controllers;

use App\Dokter;
use App\Pasien;
use App\Poli;
use App\RekamMedis;
use App\Konsul;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;

class DokterController extends Controller
{
    public function index(Request $request){
    	if(!$request->session()->exists('admin')){
            alert()->error('Kamu Harus Login Dulu!', 'Peringatan!');
            return redirect('/admin/loginAdmin');
        } else {
            $poli = Poli::all();  
    		return view('admin/dataDokter', compact('poli'));
    	}
    }

    public function tambah(Request $request) {
        if(!$request->session()->exists('admin')){
            alert()->error('Kamu Harus Login Dulu!', 'Peringatan!');
            return redirect('/admin/loginAdmin');
        }else{
            $poli = Poli::all();
            return view('admin/TambahDataDokter', compact('poli'));
        }
    }

    public function store(Request $request) {

        $request->validate([
            'foto'          => 'file|image|mimes:jpeg,png,jpg|max:2048',
            'username'      => 'required|string|max:50|unique:dokter',
            'nama_dokter'   => 'required',
            'id_poli'       => 'required',
            'jk'            => 'required',
            'no_telp'       => 'required', 
            'alamat'        => 'required', 
            'password'      => 'required'
        ],
        [
            'nama_dokter.required'  => 'Nama Dokter Belum Diisi',
            'username.required'     => 'username belum diisi',
            'id_poli.required'      => 'Poli Belum Diisi',
            'jk.required'           => 'Jenis Kelamin Belum Diisi',
            'no_telp.required'      => 'Nomor HP Belum Diisi', 
            'alamat.required'       => 'Alamat Belum Diisi',
            'password.required'     => 'Password Belum Diisi'
        ]);

        $file = $request->file('foto');
        $nama_file = time()."_".$file->getClientOriginalName();
        $tujuan_upload = 'assets/img/dokter';
        $file -> move($tujuan_upload,$nama_file);

        $data              = new Dokter();
        $data->foto        = $nama_file;
        $data->username    = $request->username; 
        $data->nama_dokter = $request->nama_dokter;
        $data->id_poli     = $request->id_poli;
        $data->jk          = $request->jk;
        $data->no_telp     = $request->no_telp;
        $data->alamat      = $request->alamat;
        $data->password    = $request->password;
        
        $data->save();
        alert()->success('Data Dokter Sudah Ditambahkan', 'Berhasil');
        return redirect('/admin/dataDokter');
    }
    public  function tampil_data(Request $request){
        if(!$request->session()->exists('admin')){
            alert()->error('Kamu Harus Login Dulu!', 'Peringatan!');
            return redirect('/admin/loginAdmin');
        }else{
            $datas = Dokter::all();     
            $poli  = Poli::all();    
            return view('admin/dataDokter',compact('datas','poli'));     
        }
    }

    public function ubah(Request $request, $id) {
        if(!$request->session()->exists('admin')){
            alert()->error('Kamu Harus Login Dulu!', 'Peringatan!');
            return redirect('/admin/loginAdmin');
        }else{
            $datas = Dokter::find($id);
            $poli  = Poli::all();    
            return view('admin/UbahDataDokter',compact('datas','poli'));
        }
    }

    public function update($id, Request $request) {
        $request->validate([
            'foto'          => 'file|image|mimes:jpeg,png,jpg|max:2048',
            'nama_dokter'   => 'required',
            'username'      => 'required',
            'jk'            => 'required',
            'no_telp'       => 'required', 
            'alamat'        => 'required',       
            'password'      => 'required',       
        ],
        [
            'nama_dokter.required'  => 'Nama Dokter Belum Diisi',
            'username.requird'      => 'username belum diisi',
            'jk.required'           => 'Jenis Kelamin Belum Diisi',
            'no_telp.required'      => 'Nomor HP Belum Diisi', 
            'alamat.required'       => 'Alamat Belum Diisi', 
            'password.required'     => 'Password Belum Diisi'
        ]);


        $data = Dokter::find($id);
        $data->nama_dokter  = $request->nama_dokter;
        $data->username     = $request->username;
        $data->jk           = $request->jk;
        $data->no_telp      = $request->no_telp;
        $data->alamat       = $request->alamat;
        $data->password     = $request->password;
        if (empty($request->foto)){
            $data->foto = $data->foto;
        }
        else{
            unlink('assets/img/dokter/'.$data->foto); //menghapus file lama
            $file = $request->file('foto'); // menyimpan data gambar yang diupload ke variabel $file
            $nama_file = time()."_".$file->getClientOriginalName();
            $file->move('assets/img/dokter',$nama_file); // isi dengan nama folder tempat kemana file diupload
            $data->foto = $nama_file;
        }
        $data->save();
        alert()->success('Data Dokter Sudah Diubah', 'Berhasil');
        return redirect('admin/dataDokter');
    }

    public function delete($id) {
        $datas = Dokter::find($id);
        $datas->delete();
        alert()->warning('Data Dokter Sudah Dihapus', 'Hapus');
        return redirect('/admin/dataDokter');
    }

    public function dashboard(){
        if(!session()->exists('dokter')){
            alert()->error('Kamu Harus Login Dulu!', 'Peringatan!');
            return redirect('/dokter/loginDokter');
        }
        else{
            return view('/dokter/DashboardDokter');
        }
    }

    public function data(Request $request){
        if(!$request->session()->exists('dokter')){
            alert()->error('Kamu Harus Login Dulu!', 'Peringatan!');
            return redirect('/dokter/loginDokter');
        }else{
            $konsul  = Konsul::where('id_dokter', session('dokter'))->count();
            $medis   = RekamMedis::where('id_dokter', session('dokter'))->count();
            return view('dokter/DashboardDokter',compact('konsul','medis'));    
        } 
    }

    public function loginDokter(){
        return view('dokter.loginDokter');
    }

    public function loginDokterPost(Request $request){

        $auth = auth()->guard('dokter');

        $credentials = [
            'username'  => $request->username,
            'password'  => $request->password,
        ];

        $validator = Validator::make($request->all(),[
                'username'  => 'required|exists:dokter',
                'password'  => 'required|string',
            ], 
            [
                'username.exists'    => 'Akun tidak terdaftar',   
                'username.required'  => 'Username tidak boleh kosong',
                'password.required'  => 'Password tidak boleh kosong'
            ],
        );

        if($validator->fails()) {
            return view('dokter.loginDokter')->withErrors($validator);
        }else{
            if($auth->attempt($credentials)){
                $dokter  = Dokter::where('username', $request->username)->first();
                session()->put('dokter', $dokter->id_dokter);
                session()->put('nama_dokter', $dokter->nama_dokter);

                $konsul  = Konsul::where('id_dokter', $dokter->id_dokter)->count();
                $medis   = RekamMedis::where('id_dokter', $dokter->id_dokter)->count(); 
                return view('dokter.DashboardDokter', compact('konsul', 'medis'));
            }else{
                return redirect()
                    ->back()
                    ->withInput($request->input())
                    ->withErrors(
                        ['password' => 'password anda salah']
                    );
            }
        }
    }

    public function logoutDokter(){
        Session::flush();
        alert()->info('Anda Sudah Logout', 'Logout');
        return redirect('/dokter/loginDokter');
    }

    public function registerDokter(Request $request){
        return view('/dokter/registerDokter');
    }

    public function registerDokterPost(Request $request){
        $this->validate($request, [
            'nama_dokter' => 'required|min:4',
            'username' => 'required|min:4',
            'password' => 'required',
            'confirmation' => 'required|same:password',
            
        ]);

        $data =  new Dokter();
        $data->nama_dokter = $request->nama_dokter;
        $data->username    = $request->username;
        $data->jk          = $request->jk;
        $data->umur        = $request->umur;
        $data->no_telp     = $request->no_telp;
        $data->id_poli     = $request->id_poli;
        $data->password    = $request->password;
        
        $data->save();
        return redirect('/dokter/loginDokter')->with('alert-success','Kamu berhasil Register');
    }

    public function datapasien(Request $request){
        if(!$request->session()->exists('dokter')){
            alert()->error('Kamu Harus Login Dulu!', 'Peringatan!');
            return redirect('/dokter/loginDokter');
        }else{
            $datas          = Dokter::all();  
            $pasien         = Pasien::all();
            $rekam_medis    = RekamMedis::all();       
            return view('dokter/dataDiriPasien',compact('datas','pasien','rekam_medis'));    
        } 
    }
}
