<?php

namespace App\Http\Controllers;

use App\Pasien;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
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

        $credentials = [
            'username'  => $request->username,
            'password'  => $request->password,
        ];

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
                $id_pasien  = Pasien::whereUsername($request->username)->value('id_pasien');
                $pasien     = Pasien::whereIdPasien($id_pasien)->first();/* 
                $antrian    = Antrian::where('nama_pasien', $pasien->nama_pasien) 
                                ->value('id_antrian'); */
                Session::put('pasien', $id_pasien);
                return view('pasien.profile', compact('id_pasien', 'pasien'));
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

    public function logoutPasien(Request $request){
        $request->session()->forget('pasien');
        return redirect()->route('loginPasien');
    }

    public function showRegisterPasien(){
        return view('pasien.register');
    }

    public function registerPasien(Request $request){
        $request->validate([
            'username'          => 'required|unique:pasien|max:50|string|regex:/^[a-zA0-9]*$/',
            'nama_pasien'       => 'required|max:100|string|regex:/^[a-zA-Z\s]*$/',
            'jk'                => 'required|in:laki-laki,perempuan',
            'umur'              => 'required|min:1|numeric',
            'no_telp'           => 'required|string|regex:/^[0-9]*$/',
            'alamat'            => 'required|max:255',
            'password'          => 'required'
        ]);

        $data = [
            'username'      => $request->username,
            'nama_pasien'   => $request->nama_pasien,
            'jk'            => $request->jk,
            'umur'          => $request->umur,
            'no_telp'       => $request->no_telp,
            'alamat'        => $request->alamat,
            'password'      => $request->password
        ];

        Pasien::create($data);

        return redirect()->route('loginPasien')->with('success', 'Daftar akun berhasil');
    }
}
