<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Pasien;
use App\Dokter;
use App\Antrian;
use App\Poli;
use Redirect\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class AntrianController extends Controller
{
    public  function index(Request $request){
        if(!$request->session()->exists('admin')){
            alert()->error('Kamu Harus Login Dulu!', 'Peringatan!');
            return redirect('/admin/loginAdmin');
        }else{
            //ModelAntrian::where('tanggal_antrian','<',Carbon::now()->subDays(1))->delete();
            Antrian::whereRaw('tanggal < now() - interval 1 DAY')->delete();
            $antrian  = Antrian::all()->sortBy('no_antrian');   
            $poli     = Poli::all();
    	    return view('admin/dataAntrian',compact('antrian', 'poli'));     
        }
    }

    public function tambah(Request $request) {
        if(!$request->session()->exists('admin')){
            alert()->error('Kamu Harus Login Dulu!', 'Peringatan!');
            return redirect('/admin/loginAdmin');
        }else{
            $dokter = Dokter::all();
            return view('admin/TambahDataAntrian', compact('dokter'));
        }
    }

    public function store(Request $request) {
        if($request->has('admin')){
            $request->validate([
                'nama_poli' => 'required',
                'nama_pasien' => 'required',
            
                'tanggal' => 'required', 
                'no_antrian' => 'required', 
                
            ],
            [
                'nama_poli.required' => 'Nama Poli Belum Diisi',
                'nama_pasien.required' => 'Nama Pasien Belum Diisi',
                'tanggal.required' => 'Tanggal Antrian Belum Diisi', 
                'no_antrian.required' => 'Nomor Antrian Belum Diisi', 
            ]);
            
            $poli = Dokter::where('id_dokter', $request->id_dokter)->value('id_poli');
            
            $data = new Antrian();
            $data->id_dokter    = $request->id_dokter;
            $data->id_poli      = $poli;
            $data->nama_pasien  = $request->nama_pasien;
            $data->jk           = $request->jk;
            $data->umur         = $request->umur;
            $data->no_telp      = $request->no_telp;
            $data->tanggal      = $request->tanggal;
            $data->no_antrian   = $request->no_antrian;
            $data->status = 0;
            $data->save();
            return redirect('admin/dataAntrian');
        }elseif($request->has('user')) {
            $request->validate([
                'nama_poli' => 'required',
                'nama_pasien' => 'required',
            
                'tanggal' => 'required', 
                'no_antrian' => 'required', 
                
            ],
            [
                'nama_poli.required' => 'Nama Poli Belum Diisi',
                'nama_pasien.required' => 'Nama Pasien Belum Diisi',
                'tanggal.required' => 'Tanggal Antrian Belum Diisi', 
                'no_antrian.required' => 'Nomor Antrian Belum Diisi', 
            ]);
            
            $poli = Dokter::where('id_dokter', $request->id_dokter)->value('id_poli');
            
            $data = new Antrian();
            $data->id_dokter    = $request->id_dokter;
            $data->id_poli      = $poli;
            $data->nama_pasien  = $request->nama_pasien;
            $data->jk           = $request->jk;
            $data->umur         = $request->umur;
            $data->no_telp      = $request->no_telp;
            $data->tanggal      = $request->tanggal;
            $data->no_antrian   = $request->no_antrian;
            $data->status = 0;
            $data->save();
            return redirect()->route('pesanAntrian');
        }else{
            $validator = Validator::make($request->all(),[
                'id_dokter' => 'required',
            ], 
            [
                'id_dokter.required' => 'Poli dan Dokter harus dipilih',
            ]);
    
            if($validator->fails()) {
                return response()->json([
                    'error'      => 1,
                    'message'   => $validator->errors()->get('id_dokter')
                ], 200);
            }
    
            $poli   = Dokter::where('id_dokter', $request->id_dokter)->value('id_poli');
            $date   = Carbon::today()->format('Y-m-d');
            $pasien = Pasien::where('id_pasien',session('pasien'))->first();
                        
            $data   = [
                'id_dokter'     => $request->id_dokter,
                'id_poli'       => $poli,
                'nama_pasien'   => $pasien->nama_pasien,
                'jk'            => $pasien->jk,
                'umur'          => $pasien->umur,
                'no_telp'       => $pasien->no_telp,
                'tanggal'       => $date,
                'status'        => 0
            ];
    
            $exists = Antrian::where('nama_pasien', $pasien)->get();
    
            if(count($exists)){
                return response()->json([
                    'error'     => 1,
                    'message'   => 'Tidak boleh memesan antrian dua kali dalam sehari'
                ], 200);
            }
    
            $create = Antrian::create($data);
            
            if($create){
                return response()->json([
                    'error'   => 0,
                    'message' => 'Data berhasil di tambahkan'
                ], 200);
            }
        }
    }

    public function ubah(Request $request, $id_antrian) {
        if(!$request->session()->exists('admin')){
            alert()->error('Kamu Harus Login Dulu!', 'Peringatan!');
            return redirect('/admin/loginAdmin');
        }else{
            $datas = Antrian::find($id_antrian);
            return view('admin.UbahDataAntrian',compact('datas'));
        }
    }

    public function update($id_antrian, Request $request) {
        $this->validate($request, [
            'no_antrian' => 'required|unique:antrian,no_antrian'      
        ],
        [
            'no_antrian.unique.required' => 'No antrian sudah ada, Harus Isi No Antrian' 
        ]);

        $data = Antrian::find($id_antrian);
        
        $data->no_antrian = $request->no_antrian;
        $data->status     = 1;
        $data->save();
        alert()->success('No Antrian Sudah DItambahkan', 'Berhasil');
        return redirect('admin/dataAntrian');
    }

    public function delete($id_antrian) {
        $datas  = Antrian::find($id_antrian);
        $datas1 = Antrian::where('updated_at', '<', Carbon::now()->subDays(1))->get();
        
        foreach($datas1 as $data){
            $data->delete();
        }
        $datas->delete();
        alert()->warning('Data Antrian Sudah Dihapus', 'Hapus');
        return redirect('admin/dataAntrian');
    }

    public function detailAntrian($id_antrian) {
        if(!session()->exists('admin')){
            alert()->error('Kamu Harus Login Dulu!', 'Peringatan!');
            return redirect('/admin/loginAdmin');
        }else{
            $datas = Antrian::find($id_antrian);
            return view('admin/detailDataAntrian',compact('datas'));
        }
    }

    public function createbyPatient(Request $request)
    {   
        if(!$request->session()->exists('pasien')){
            return redirect()->route('loginPasien');
        }else{
            $dataDokter = Dokter::all();
            return view('pasien.ambil_antrian', compact('dataDokter'));
        }
    }

    public function showByPatient()
    {
        $name     = Pasien::where('id_pasien', session('pasien'))->value('nama_pasien');
        $telp     = Pasien::where('id_pasien', session('pasien'))->value('no_telp');
        $antrian  = Antrian::where('nama_pasien', $name)->where('no_telp', $telp)->first();
        return view('pasien.lihat_antri', compact('antrian'));
    }
}
