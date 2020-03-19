<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use illuminate\Foundation\Auth\AuthenticatesUsers;
//use AuthenticatesUsers;

class AdminController extends Controller
{

    public function dashboard(Request $request){
        return view('admin.dashboard');
    }
}
