<?php

namespace App\Http\Controllers;

use App\Pasien;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{

    public function showLoginPasien(Request $request){
        if($request->session()->exists('username')){
            return redirect()->route('patientConsult');
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
                'username'  => 'required',
                'password'  => 'required|string',
            ], 
            [
                'username.required'  => 'Username tidak boleh kosong',
                'password.required'  => 'Password tidak boleh kosong',
                'username.regex'     => 'Format username salah'
            ],
        );

        if($validator->fails()) {
            return view('pasien.login')->withErrors($validator);
            dd($validator);
        }else{
            if($auth->attempt($credentials)){
                $id_pasien  = DB::table('pasien')->where('username', $request->username)->value('id_pasien');
                $name       = DB::table('pasien')->where('username', $request->username)->value('nama_pasien');
                $pasien     = Pasien::all();
                Session::put('id_pasien', $id_pasien);
                Session::put('nama_pasien', $name);
                return view('pasien.profile', compact('pasien','id_pasien', 'name'));
            }
        }
    }

    public function logoutPasien(Request $request){
        $request->session()->forget('username');
        return redirect()->route('loginPasien');
    }

    public function register(){
        return view('pasien.register');
    }
}
