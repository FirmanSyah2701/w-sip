<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use illuminate\Foundation\Auth\AuthenticatesUsers;
//use AuthenticatesUsers;

class AdminController extends Controller
{
    //protected $redirectTo = '/admin/dashboard';

    public function loginPage(){
        //if($request->session->exists('username')){
            //return redirect()->route('dashboard');
        /*
        }else {
            return view('admin.login');
        }
        */
        return view('admin.login');
    }

    public function dashboard(Request $request){
        //if(!$request->session()->exists('username')){
            //return redirect()->route('loginPage');
            /*
        }else{
             $username = $request->session()->get('username');
            $name  = DB::table('admin')
                      ->where('username', $username)
                      ->value('name_admin');
            return view('admin.dashboard', compact(
                'name'
            ));
        }
        */
        return view('admin.dashboard');
    }

    public function loginAdmin(Request $request){
        $auth = auth()->guard('admin');

        $credentials = [
            'username'  => $request->username,
            'password'  => $request->password,
        ];

        $validator = Validator::make($request->all(),[
            'username'  =>  'required|max:20',
            'password'  => 'required|string|min:6',
        ]);
    }

    public function logoutAdmin(Request $request){
        $request->session()->forget('username');
        return redirect()->route('loginPage');
    }

    //fitur konten
    public function informasi(){
        return view('admin.info');
    }
    // fitur akun
    public function akunAdmin(){

    }
}
