<?php

namespace App\Http\Controllers;

use App\Blog;
use App\Poli;
use App\Admin;
use App\Pasien;
use App\Dokter;
use App\Antrian;
use Carbon\Carbon;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    public function dashboardAdmin(){
        if(!session()->exists('admin')){
            alert()->error('Kamu Harus Login Dulu!', 'Peringatan!');
            return redirect('/admin/loginAdmin');
        }
        else{ 
            Antrian::whereRaw('tanggal < now() - interval 1 DAY')->delete();
            $dokter  = Dokter::count();
            $poli    = Poli::count();
            $blog    = Blog::count();
            $antrian = Antrian::count();
            $pasien  = Pasien::count();
            return view('admin.DashboardAdmin', compact(
                'dokter','poli','blog','antrian','pasien'
            ));
        }
    }

    public function loginAdmin(){
        if(session()->exists('admin')){
            return redirect()->back();
        }else{
            return view('admin.loginAdmin');
        }
    }

    public function loginAdminPost(Request $request){
        $auth = auth()->guard('admin');

        $credentials = [
            'username'  => $request->username,
            'password'  => $request->password,
        ];

        $validator = Validator::make($request->all(),[
                'username'  => 'required|string|exists:admin',
                'password'  => 'required|string',
            ], 
            [
                'username.exists'    => 'Akun tidak terdaftar',   
                'username.required'  => 'Username tidak boleh kosong',
                'password.required'  => 'Password tidak boleh kosong'
            ],
        );

        if($validator->fails()) {
            return redirect()->back()->withErrors($validator);
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
                    ->withErrors(
                        ['password' => 'password anda salah']
                    );
            }
        }
    }

    public function logoutAdmin(){
        session()->forget('admin');
        alert()->info('Anda Sudah Logout', 'Logout');
        return redirect('/admin/loginAdmin');
    }
}
