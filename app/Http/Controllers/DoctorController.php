<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Doctor;
class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $doctor = Doctor::all();
        return view('admin.list_doctor', compact('doctor'))->with('i');
    }

    public function store(Request $request)
    {
        $request->validate([
                'doctor_id'     => 'required|numeric|max:12|regex:/^[0-9]*$/',
                'doctor_name'   => 'required|string|max:100|regex:/^[a-zA-Z\s]*$/',
                'specialist'    => 'required|string|max:50|regex:/^[a-zA-Z\s&]*$/'
            ],
            [
                'required'            => 'Data tidak boleh kosong',
                'numeric'             => 'Data harus diisi dengan angka',
                'string'              => 'Data harus diisi dengan huruf/kata',
                'doctor_id.max'       => 'Tidak boleh lebih 12 digit angka',
                'doctor_name.max'     => 'Tidak boleh lebih 100 huruf',
                'specialist.max'      => 'Tidak boleh lebih 50 huruf',
            ]
        );

        $data = array(
            'doctor_id'     => $request->doctor_id,
            'doctor_name'   => $request->doctor_name,
            'specialist'    => $request->specialist
        );
        Doctor::create($data);
        return redirect('doctor')->with('success', 'Data Berhasil Ditambah');
    }

    public function show($id)
    {
        $doctor = Doctor::findOrFail($id);
        return view('admin.list_doctor', compact('doctor'))->with('i');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'doctor_name'   => 'required|string|max:100|regex:/^[a-zA-Z\s]*$/',
            'specialist'    => 'required|string|max:50|regex:/^[a-zA-Z\s&]*$/'
        ],
        [
            'required'            => 'Data tidak boleh kosong',
            'numeric'             => 'Data harus diisi dengan angka',
            'string'              => 'Data harus diisi dengan huruf/kata',
            'doctor_name.max'     => 'Tidak boleh lebih 100 huruf',
            'specialist.max'      => 'Tidak boleh lebih 50 huruf',
        ]
    );
        $data = array(
            'doctor_name'   => $request->doctor_name,
            'specialist'    => $request->specialist
        );
        Doctor::whereDoctor_id($id)->update($data);
        return redirect('doctor')->with('success', 'Data Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $doctor = Doctor::findOrFail($id);
        $doctor->delete();
        return redirect('doctor')->with('success', 'Data Berhasil Dihapus');
    }
}
