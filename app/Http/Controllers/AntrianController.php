<?php

namespace App\Http\Controllers;

use App\Poli;
use App\Pasien;
use App\Dokter;
use App\Antrian;

use Carbon\Carbon;
use Redirect\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AntrianController extends Controller
{
    public function index(){
        if(!session()->exists('admin')){
            alert()->error('Kamu Harus Login Dulu!', 'Peringatan!');
            return redirect('/admin/loginAdmin');
        }else{
            $antrian  = Antrian::all()->sortBy('no_antrian');   
            $poli     = Poli::all();
    	    return view('admin.dataAntrian',compact('antrian', 'poli'));     
        }
    }

    public function tambah() {
        if(!session()->exists('admin')){
            alert()->error('Kamu Harus Login Dulu!', 'Peringatan!');
            return redirect('/admin/loginAdmin');
        }else{
            $dokter = Dokter::all();
            $now    = Carbon::today()->toDateString();
            return view('admin.TambahDataAntrian', compact('dokter', 'now'));
        }
    }

    public function store(Request $request) {
        if($request->has('admin')){  
            $request->validate([
                'id_dokter'   => 'required',
                'nama_pasien' => 'required|string|max:100|regex:/^[a-zA-Z\s]*$/',
                'jk'          => 'required|in:laki-laki,perempuan',
                'umur'        => 'required|numeric|min:1|max:100',
                'no_telp'     => 'required|string|regex:/^[0-9]*$/',
                'tanggal'     => 'required|date|before:tomorrow',
                'no_antrian'  => 'required|numeric|regex:/^[0-9]*$/',
            ],
            [
                'id_dokter.required'   => 'Poli dan dokter harus dipilih',
                'nama_pasien.required' => 'Nama pasien tidak boleh kosong',
                'nama_pasien.max'      => 'Nama pasien maksimal 100 karakter',
                'nama_pasien.regex'    => 'Format nama harus menggunakan huruf!',
                'jk.required'          => 'Jenis kelamin harus diisi',
                'jk.in'                => 'Jenis kelamin hanya boleh antara laki-laki atau perempuan',
                'umur.required'        => 'Usia harus diisi',
                'umur.numeric'         => 'Usia harus diisi dengan angka',
                'umur.min'             => 'Usia minimal 1 tahun',
                'umur.max'             => 'Usia maksimal 100 tahun',
                'no_telp.required'     => 'Nomer hp harus diisi', 
                'no_telp.regex'        => 'Nomer hp harus diisi dengan angka',
                'tanggal.required'     => 'Tanggal harus diisi!',
                'tanggal.before'       => 'Tanggal hanya boleh diisi hari ini atau hari selanjutnya',
                'no_antrian.required'  => 'Nomer antrian harus diisi' 
            ]);
            
            $poli           = Dokter::where('id_dokter', $request->id_dokter)
                                ->value('id_poli');
            $checkAntrian   = Antrian::where('no_antrian', $request->no_antrian)
                                ->where('id_dokter', $request->id_dokter)
                                ->where('id_poli', $request->id_poli)
                                ->count(); 
            $tanggal        = date('l', strtotime($request->tanggal));

            if($tanggal != 'Saturday' && $tanggal != 'Sunday'){
                if($checkAntrian >= 1){
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
                }else{
                    return redirect()->back()->withErrors('Nomer antrian sudah ada');    
                }
            }else{
                return redirect()->back()->withErrors('Sabtu dan Minggu puskesmas tutup');
            }
        }elseif($request->has('user')) {
            $request->validate([
                'id_dokter'   => 'required',
                'nama_pasien' => 'required|string|max:100|regex:/^[a-zA-Z\s]*$/',
                'jk'          => 'required|in:laki-laki,perempuan',
                'umur'        => 'required|numeric|min:1|max:100',
                'no_telp'     => 'required|string|regex:/^[0-9]*$/',
                'tanggal'     => 'required|date|before:tomorrow',
            ],
            [
                'id_dokter.required'   => 'Poli dan dokter harus dipilih',
                'nama_pasien.required' => 'Nama Pasien tidak boleh kosong',
                'nama_pasien.max'      => 'Nama pasien maksimal 100 karakter',
                'nama_pasien.regex'    => 'Format nama harus menggunakan huruf!',
                'jk.required'          => 'Jenis kelamin harus diisi',
                'jk.in'                => 'Jenis kelamin hanya boleh antara laki-laki atau perempuan',
                'umur.required'        => 'Usia harus diisi',
                'umur.numeric'         => 'Usia harus diisi dengan angka',
                'umur.min'             => 'Usia minimal 1 tahun',
                'umur.max'             => 'Usia maksimal 100 tahun',
                'no_telp.required'     => 'Nomer HP harus diisi', 
                'no_telp.regex'        => 'Nomer HP harus diisi dengan angka',
                'tanggal.required'     => 'Tanggal harus diisi!',
                'tanggal.before'       => 'Tanggal hanya boleh diisi hari ini atau hari selanjutnya'
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
            $data->status = 0;
            $data->save();
            return redirect()->route('pesanAntrian')->with('success', 'Pesanan Berhasil Disimpan');
        }else{
            $validator = Validator::make($request->all(),[
                'id_dokter'     => 'required',
                'tanggal'       => 'required|date|before:tomorrow'
            ], 
            [
                'id_dokter.required'   => 'Poli dan Dokter harus dipilih',
                'tanggal.required'     => 'Tanggal harus diisi!', 
                'tanggal.before'       => 'Tanggal hanya boleh diisi hari ini atau hari selanjutnya',
            ]);
    
            if($validator->fails()) {
                return response()->json([
                    'error'      => 2,
                    'message1'   => $validator->errors()->get('id_dokter'),
                    'message2'   => $validator->errors()->get('tanggal')
                ], 200);
            }
    
            $poli   = Dokter::where('id_dokter', $request->id_dokter)->value('id_poli');
            $pasien = Pasien::where('id_pasien',session('pasien'))->first();
            
            $data   = [
                'id_dokter'     => $request->id_dokter,
                'id_poli'       => $poli,
                'nama_pasien'   => $pasien->nama_pasien,
                'jk'            => $pasien->jk,
                'umur'          => $pasien->umur,
                'no_telp'       => $pasien->no_telp,
                'tanggal'       => $request->tanggal,
                'status'        => 0
            ];
    
            $exists = Antrian::where('nama_pasien', $pasien->nama_pasien)
                        ->where('no_telp', $pasien->no_telp)->count();
            if($exists > 0){
                return response()->json([
                    'error'     => 1,
                    'message'   => 'Tidak boleh memesan lebih dari satu kali dalam sehari'
                ], 200);
            }else{
                $create = Antrian::create($data);
            
                if($create){
                    return response()->json([
                        'error'   => 0,
                        'message' => 'Data berhasil di tambahkan'
                    ], 200);
                }
            }
        }
    }

    public function ubah($id_antrian) {
        if(!session()->exists('admin')){
            alert()->error('Kamu Harus Login Dulu!', 'Peringatan!');
            return redirect('/admin/loginAdmin');
        }else{
            $datas = Antrian::find($id_antrian);
            return view('admin.UbahDataAntrian',compact('datas'));
        }
    }

    public function update($id_antrian, Request $request) {
        $request->validate([
            'no_antrian' => 'required|numeric|min:1|max:100'      
        ],
        [
            'no_antrian.required' => 'Nomer antrian harus diisi',
            'no_antrian.numeric'  => 'Nomer antrian harus diisi dengan angka',
            'no_antrian.max'      => 'Batas nomer antrian maksimal 100',
            'no_antrian.min'      => 'Batas nomer antrian minimal 1'
        ]);
        
        $exists = Antrian::where('no_antrian', $request->no_antrian)
                    ->where('id_dokter', $request->id_dokter)
                    ->where('id_poli', $request->id_poli)
                    ->count();
        if($exists >= 1){
            return redirect()
                ->back()
                ->withErrors('Pada poli tersebut nomer antrian tidak boleh sama');
        }else{
            $data   = Antrian::find($id_antrian);
            $data->no_antrian = $request->no_antrian;
            $data->status     = 1;
            $data->save();
            alert()->success('No Antrian Sudah DItambahkan', 'Berhasil');
            return redirect('admin/dataAntrian');
        }
    }

    public function delete($id_antrian) {
        $datas  = Antrian::find($id_antrian);
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

    public function createByPatient(){
        if(!session()->exists('pasien')){
            return view('pasien.login');
        }else{
            $dataDokter = Dokter::all();
            $now        = Carbon::today()->toDateString();
            return view('pasien.ambil_antrian', compact('dataDokter', 'now'));
        }
    }

    public function showByPatient()
    {
        $name     = Pasien::where('id_pasien', session('pasien'))->value('nama_pasien');
        $antrian  = Antrian::where('nama_pasien', $name)->first();
        if($antrian != null){
            return view('pasien.lihat_antri', compact('antrian'));
        }else{
            return view('pasien.no_antri_kosong');
        }
    }
}
