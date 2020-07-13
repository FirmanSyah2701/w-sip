<?php

namespace App\Http\Controllers;

use App\Poli;
use App\Pasien;
use App\Dokter;
use App\Konsul;
use App\RekamMedis;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DokterController extends Controller
{
    public function tambah() {
        if(!session()->exists('admin')){
            alert()->error('Kamu Harus Login Dulu!', 'Peringatan!');
            return redirect('/admin/loginAdmin');
        }else{
            $poli = Poli::all();
            return view('admin/TambahDataDokter', compact('poli'));
        }
    }

    public function store(Request $request) {
        $request->validate([
            'foto'          => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'username'      => 'required|alpha_num|max:50|unique:dokter,username',
            'nama_dokter'   => 'required|string|max:100|regex:/^[a-zA-Z\s]*$/',
            'id_poli'       => 'required',
            'jk'            => 'required|in:laki-laki,perempuan',
            'no_telp'       => 'required|string|min:10|max:15|regex:/^[0-9]*$/', 
            'alamat'        => 'required', 
            'password'      => 'required|alpha_num|min:8|max:50'
        ],
        [
            'foto.required'         => 'Foto harus diisi',
            'foto.uploaded'         => 'Ukuran file tidak boleh lebih dari 2MB!',
            'nama_dokter.required'  => 'Nama dokter Belum Diisi',
            'nama_dokter.regex'     => 'Format nama dokter menggunakan huruf dan spasi',
            'nama_dokter.max'       => 'Nama dokter maksimal 100 karakter',
            'username.required'     => 'username belum diisi',
            'username.unique'       => 'Akun sudah terdaftar',
            'username.alpha_num'    => 'Format username berupa huruf atau angka 
                                        dan tidak boleh menggunakan spasi',
            'id_poli.required'      => 'Poli belum diisi',
            'jk.required'           => 'Jenis kelamin belum diisi',
            'jk.in'                 => 'Jenis kelamin hanya boleh antara laki-laki atau perempuan',
            'no_telp.required'      => 'Nomor hp belum diisi',
            'no_telp.regex'         => 'Format nomer hp harus berupa bilangan bulat',
            'no_telp.min'           => 'batas nomer telpon minimal 10 digit',
            'no_telp.max'           => 'batas nomer telpon maksimal 15 digit',
            'alamat.required'       => 'Alamat belum diisi',
            'password.required'     => 'Password belum diisi',
            'password.alpha_num'    => 'Format password berupa huruf atau angka 
                                        dan tidak boleh menggunakan spasi',
            'password.min'          => 'Password minimal 8 karakter',
            'password.max'          => 'Password maksimal 50 karakter'
        ]);

        $file           = $request->file('foto');
        $nama_file      = time()."_".$file->getClientOriginalName();
        $tujuan_upload  = 'assets/img/dokter';
        $file->move($tujuan_upload,$nama_file);

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
    public function dataDokter(){
        if(!session()->exists('admin')){
            alert()->error('Kamu Harus Login Dulu!', 'Peringatan!');
            return redirect('/admin/loginAdmin');
        }else{
            $datas = Dokter::all();     
            $poli  = Poli::all();    
            return view('admin/dataDokter',compact('datas','poli'));     
        }
    }

    public function ubah($id) {
        if(!session()->exists('dokter')){
            alert()->error('Kamu Harus Login Dulu!', 'Peringatan!');
            return redirect('dokter/loginDokter');
        }else{
            $datas = Dokter::find($id);
            $poli  = Poli::all();    
            return view('admin/UbahDataDokter',compact('datas','poli'));
        }
    }

    public function update($id, Request $request) {
        $request->validate([
            'foto'          => 'image|mimes:jpeg,png,jpg|max:2048',
            'username'      => 'required|string|max:50|unique:dokter|regex:/^[a-zA0-9]*$/',
            'nama_dokter'   => 'required|string|max:100|regex:/^[a-zA-Z\s]*$/',
            'id_poli'       => 'required',
            'no_telp'       => 'required|string|min:10|max:15|regex:/^[0-9]*$/', 
            'alamat'        => 'required', 
        ],
        [
            'foto.uploaded'         => 'Ukuran file tidak boleh lebih dari 2MB!',
            'nama_dokter.required'  => 'Nama Dokter Belum Diisi',
            'username.required'     => 'username belum diisi',
            'username.unique'       => 'Akun sudah terdaftar',
            'username.regex'        => 'Format username berupa huruf atau angka 
                                        dan tidak boleh menggunakan spasi',
            'id_poli.required'      => 'Poli Belum Diisi',
            'no_telp.required'      => 'Nomor HP Belum Diisi',
            'no_telp.regex'         => 'Format nomer hp harus berupa bilangan bulat',
            'no_telp.min'           => 'batas nomer telpon minimal 10 digit',
            'no_telp.min'           => 'batas nomer telpon maksimal 15 digit',
            'alamat.required'       => 'Alamat Belum Diisi',
        ]);

        $data = Dokter::find($id);
        $data->nama_dokter  = $request->nama_dokter;
        $data->username     = $request->username;
        $data->no_telp      = $request->no_telp;
        $data->alamat       = $request->alamat;
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

    public function dashboardDokter(){
        if(!session()->exists('dokter')){
            alert()->error('Kamu Harus Login Dulu!', 'Peringatan!');
            return redirect('/dokter/loginDokter');
        }else{
            $konsul  = Konsul::where('id_dokter', session('dokter'))->count();
            $medis   = RekamMedis::where('id_dokter', session('dokter'))->count();
            return view('dokter/DashboardDokter',compact('konsul','medis'));    
        } 
    }

    public function loginDokter(){
        if(session()->exists('dokter')){
            return redirect()->back();
        }else{
            return view('dokter.loginDokter');
        }
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
                session()->put('jk_dokter', $dokter->jk);
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
        session()->forget('dokter');
        alert()->info('Anda Sudah Logout', 'Logout');
        return redirect('/dokter/loginDokter');
    }
}
