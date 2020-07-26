<?php

namespace App\Http\Controllers;

use App\Pasien;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PasienController extends Controller
{
    public function showLoginPasien(Request $request){
        if($request->session()->exists('pasien')){
            return redirect()->route('profilePasien');
        }else{
            return view('pasien.login');
        }
    }
    
    public function loginPasien(Request $request){
        $auth = auth()->guard('pasien');

        $credentials = $request->only('username', 'password');

        $validator = Validator::make($request->all(),[
                'username'  => 'required|exists:pasien',
                'password'  => 'required|string',
            ], 
            [
                'username.exists'    => 'Akun tidak terdaftar',   
                'username.required'  => 'Username tidak boleh kosong',
                'password.required'  => 'Password tidak boleh kosong'
            ],
        );

        if($validator->fails()) {
            return view('pasien.login')->withErrors($validator);
        }else{
            if($auth->attempt($credentials)){
                $id_pasien  = Pasien::where('username', $request->username)->value('id_pasien');
                $pasien     = Pasien::where('id_pasien',$id_pasien)->first();
                session()->put('pasien', $id_pasien);
                return view('pasien.profile', compact('id_pasien', 'pasien'));
            }else{
                return redirect()
                    ->back()
                    ->withErrors(
                        ['password' => 'password anda salah']
                    );
            }
        }
    }

    public function logoutPasien(Request $request){
        $request->session()->forget('pasien');
        return redirect('/');
    }

    public function showRegisterPasien(){
        return view('pasien.register');
    }

    public function registerPasien(Request $request){
        $request->validate([
            'username'          => 'required|unique:pasien|string|max:50|regex:/^[a-zA-Z0-9_]*$/',
            'nama_pasien'       => 'required|max:100|string|regex:/^[a-zA-Z\s\']*$/',
            'jk'                => 'required|in:laki-laki,perempuan',
            'umur'              => 'required|min:1|max:100|numeric|regex:/^[0-9]*$/',
            'no_telp'           => 'required|string|min:10|max:15|regex:/^[0-9]*$/',
            'alamat'            => 'required|string',
            'password'          => 'required|alpha_num|min:8|max:50'
        ],
        [
            'nama_pasien.required'  => 'Nama pasien Belum Diisi',
            'nama_pasien.regex'     => 'Format nama pasien hanya boleh huruf, spasi dan tanda petik satu',
            'nama_pasien.max'       => 'Nama pasien maksimal 100 karakter',
            'username.required'     => 'username belum diisi',
            'username.unique'       => 'Akun sudah terdaftar',
            'username.regex'        => 'Format username berupa huruf atau angka 
                                        dan tidak boleh menggunakan spasi hanya boleh _',
            'username.max'          => 'Username maksimal panjang 50 karakter',
            'id_poli.required'      => 'Poli belum diisi',
            'jk.required'           => 'Jenis kelamin belum diisi',
            'jk.in'                 => 'Jenis kelamin hanya boleh antara laki-laki atau perempuan',
            'umur.min'              => 'Minimal umur 1 tahun',
            'umur.max'              => 'Maksimal umur 100 tahun',
            'umur.numeric'          => 'Format umur berupa bilangan bulat',
            'umur.regex'            => 'Format umur berupa bilangan bulat',
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

        Pasien::create($request->all());

        return redirect()->route('loginPasien')->with('success', 'Daftar akun berhasil');
    }

    public function showProfile(){
        if(!session()->exists('pasien')){
            return redirect()->route('loginPasien');
        }else{
            $pasien = Pasien::where('id_pasien',session('pasien'))->first();
            return view('pasien.profile', compact('pasien'));
        }
    }

    public function editProfile(Request $request, $id){
        $foto_name  = $request->hidden_foto;
        $foto       = $request->file('foto');
        
        if($foto != ''){
            $foto_name = rand() .'.'.$foto->getClientOriginalExtension();
            $foto->move(public_path('assets/img/product'), $foto_name);
        }

        $request->validate([
            'username'       => 'required|unique:pasien|alpha_num|max:50',
            'nama_pasien'    => 'required|max:100|string|regex:/^[a-zA-Z\s]*$/',
            'umur'           => 'required|min:1|max:100|numeric',
            'no_telp'        => 'required|string|min:10|max:15|regex:/^[0-9]*$/',
            'alamat'         => 'required|string',
            'foto'           => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
        ],[
            'foto.uploaded'         => 'Ukuran file tidak boleh lebih dari 2MB!',
            'nama_pasien.required'  => 'Nama pasien harus Diisi',
            'nama_pasien.regex'     => 'Format nama pasien menggunakan huruf dan spasi',
            'nama_pasien.max'       => 'Nama pasien maksimal 100 karakter',
            'username.required'     => 'username harus diisi',
            'username.unique'       => 'Akun pasien sudah terdaftar',
            'username.alpha_num'    => 'Format username berupa huruf atau angka 
                                        dan tidak boleh menggunakan spasi',
            'no_telp.required'      => 'Nomor hp harus diisi',
            'no_telp.regex'         => 'Format nomer hp harus berupa bilangan bulat',
            'no_telp.min'           => 'batas nomer telpon minimal 10 digit',
            'no_telp.max'           => 'batas nomer telpon maksimal 15 digit',
            'alamat.required'       => 'Alamat harus diisi',
        ]);
        
        $data = [
            'username'      => $request->username,
            'nama_pasien'   => $request->nama_pasien,
            'umur'          => $request->umur,
            'no_telp'       => $request->no_telp,
            'alamat'        => $request->alamat,
            'foto'          => $foto_name
        ];
        Pasien::where('id_pasien',$id)->update($data);
        return redirect()->route('profilePasien')->with('success', 'Data Berhasil Diubah');
    }

    public function dataPasien(){
        if(!session()->exists('admin')){
            alert()->error('Kamu Harus Login Dulu!', 'Peringatan!');
            return redirect('/admin/loginAdmin');
        }else{
            $datas = Pasien::all();         
            return view('admin/dataPasien',compact('datas'));     
        }
    }
}
