<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Consult;
use App\Doctor;
use App\Category;
class ConsultationController extends Controller
{
    public function index(){
        $doctor     = Doctor::orderBy('doctor_name', 'asc')->get();
        $category   = Category::orderBy('category_name', 'asc')->get(); 
        return view('pasien.konsultasi', compact('doctor', 'category'));
    }

    public function store(Request $req){
        $req->validate([
            'name'           => 'required|string|max:30|regex:/^[a-zA-Z\s]*$/',
            'category_id'    => 'required',
            'doctor_id'      => 'required',
            'consult'        => 'required|max:255'
        ],
        [
            'consult.max'    => 'Konsultasi maksimal 255 character',  
            'name.max'       => 'Nama maksimal 30 character',
            'name.min'       => 'Nama minimal 4 character', 
            'name.regex'     => 'Nama tidak boleh angka dan simbol',
            'required'       => 'Field tidak boleh kosong'
        ]
    );

        $data = array(
            'name'          => $req->name,
            'category_id'   => $req->category_id,
            'doctor_id'     => $req->doctor_id,
            'consult'       => $req->consult
        );

        Consult::create($data);
        return redirect()->route('patientConsult')->with('success', 'Data Berhasil Ditambah');
    }
}
