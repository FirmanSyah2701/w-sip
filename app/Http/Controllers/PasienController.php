<?php

namespace App\Http\Controllers;

use App\Pasien;
use Illuminate\Http\Request;

class PasienController extends Controller
{
     public function showProfile(Request $request){
        if(!$request->session()->exists('pasien')){
            return redirect()->route('loginPasien');
        }else{
            $pasien = Pasien::whereIdPasien(session('pasien'))->first();
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
            'username'       => 'required|unique:pasien|max:50|string|regex:/^[a-zA0-9]*$/',
            'nama_pasien'    => 'required|max:100|string|regex:/^[a-zA-Z\s]*$/',
            'umur'           => 'required|min:1|numeric',
            'no_telp'        => 'required|string|regex:/^[0-9]*$/',
            'alamat'         => 'required|max:190',
            'foto'           => 'nullable'
        ]);
        $data = [
            'username'      => $request->username,
            'nama_pasien'   => $request->nama_pasien,
            //'jk'          => $request->jk,
            'umur'          => $request->umur,
            'no_telp'       => $request->no_telp,
            'alamat'        => $request->alamat,
            'foto'          => $foto_name
            //'password'    => bcrypt($request->password)
        ];
        Pasien::whereId_pasien($id)->update($data);
        return redirect()->route('profilePasien')->with('success', 'Data Berhasil Diubah');
    }
}
