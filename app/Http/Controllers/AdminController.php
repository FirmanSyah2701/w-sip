<?php

namespace App\Http\Controllers;

use App\Admin;
use App\Poli;
use App\Dokter;
use App\Blog;
use App\Antrian;
use App\Pasien;
use Carbon\Carbon;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
class AdminController extends Controller
{
    public function index(Request $request){
        if(!$request->session()->exists('admin')){
            alert()->error('Kamu Harus Login Dulu!', 'Peringatan!');
            return redirect('/admin/loginAdmin');
        }
        else{ 
            //ModelAntrian::where('tanggal_antrian','<',Carbon::now()->subDays(1))->delete();
            Antrian::whereRaw('tanggal < now() - interval 1 DAY')->delete();
            $dokter  = Dokter::count();
            $poli    = Poli::count();
            $blog    = Blog::count();
            $antrian = Antrian::count();
            $pasien  = Pasien::count();
            $admin   = Admin::count();
            return view('/admin/DashboardAdmin', compact('dokter','poli','blog','antrian','pasien','admin'));
        }
    }

    public function loginAdmin(Request $request){
        if($request->session()->exists('admin')){
            return redirect()->back();
        }else{
            return view('/admin/loginAdmin');
        }
    }

    public function loginAdminPost(Request $request){
        $auth = auth()->guard('admin');

        $credentials = [
            'username'  => $request->username,
            'password'  => $request->password,
        ];

        $validator = Validator::make($request->all(),[
                'username'  => 'required|exists:admin',
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
                $admin = Admin::where('username', $request->username)->first();
                session()->put('admin', $admin->username);
                session()->put('nama_admin', $admin->nama);
                alert()->success('Login success','Anda berhasil login');
                return redirect('/admin/DashboardAdmin');
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

    public function logoutAdmin(Request $request){
        $request->session()->forget('admin');
        alert()->info('Anda Sudah Logout', 'Logout');
        return redirect('/admin/loginAdmin');
    }

    public function registerAdmin(Request $request){
        return view('/admin/registerAdmin');
    }

    public function registerAdminPost(Request $request){
        $this->validate($request, [
            'nama'      => 'required|min:4',
            'username'  => 'required|min:4',
            'password'  => 'required',
        ]);

        $data           =  new Admin();
        $data->nama     = $request->nama;
        $data->username = $request->username;
        $data->password = $request->password;
        $data->save();
        return redirect('/admin/loginAdmin')->with('alert-success','Kamu berhasil Register');
    }
}
