<?php

namespace App\Http\Controllers\API;

use App\Poli;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PoliApiController extends Controller
{
    public function getPoli(){
        $poli = Poli::all();
        return response()->json($poli);
    }

    public function store(Request $request){
        $validator = Validator::make($request->all(),[
            'nama_poli' => 'required|unique:poli|string|max:100|regex:/^[a-zA-Z\s]*$/', 
        ],
        [
            'nama_poli.required'    => 'Nama poli harus diisi',
            'nama_poli.unique'      => 'Nama poli sudah ada', 
            'nama_poli.max'         => 'Nama poli panjang karakter maksimal 100',
            'nama_poli.regex'       => 'Nama poli harus diisi dengan huruf'
        ]);

        if($validator->fails()) {
            return response()->json([
                'error'     => 1,
                'message'   => $validator->errors()->first()
            ]);
        }

        $data = Poli::create([
            'nama_poli' => $request->nama_poli
        ]);

        if($data){
            return response()->json([
                'error'   => 0, 
                'message' =>'Data berhasil disimpan'
            ]);
        }

    }

    public function update(Request $request, $id){
        $validator = Validator::make($request->all(),[
            'nama_poli' => 'required|unique:poli|string|max:100|regex:/^[a-zA-Z\s]*$/', 
        ],
        [
            'nama_poli.required'    => 'Nama poli harus diisi',
            'nama_poli.unique'      => 'Nama poli sudah ada', 
            'nama_poli.max'         => 'Nama poli panjang karakter maksimal 100',
            'nama_poli.regex'       => 'Nama poli harus diisi dengan huruf'
        ]);
        
        if($validator->fails()) {
            return response()->json([
                'error'     => 1,
                'message'   => $validator->errors()->first()
            ]);
        }

        $update = Poli::where('id_poli', $id)->update([
            'nama_poli' => $request->nama_poli
        ]);

        if($update){
            return response()->json([
                'error'     => 0,
                'message'   => 'Data berhasil diubah'
            ]);
        }
    }

    public function destroy($id){
        $data = Poli::findOrFail($id);
        try {
            $data->delete();
            return response()->json([
                'error'     => 0,
                'message'   => 'Data berhasil dihapus'
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'error'     => 1,
                'message'   => 'Data gagal dihapus'
            ]); 
        }
    }
}
