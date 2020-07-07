<?php

namespace App\Http\Controllers;

use Str;
use App\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index(Request $request){
    	if(!$request->session()->exists('admin')){
    		return redirect('admin.LoginAdmin')->with('alert','Maaf Anda Harus Login');
    	} else {
    		return view('admin.blog_admin');
    	}
    }

    public function tambah(Request $request){
        if(!$request->session()->exists('admin')){
            alert()->error('Kamu Harus Login Dulu!', 'Peringatan!');
            return redirect('/admin/loginAdmin');
        }else{
        return view('admin/TambahBlog');
        }
    }

    public function store(Request $request){
        $this->validate($request, [
            'foto' => 'file|image|mimes:jpeg,png,jpg|max:2048',
            'judul' => 'required',
            'keterangan' => 'required',
            'tanggal' => 'required',
            
        ],
        [
            'judul.required' => 'Judul Belum Diisi',
            'keterangan.required' => 'Keterangan Belum Diisi',
            'tanggal.required' => 'Tanggal Belum Diisi',
        ]);

        $file = $request->file('foto');
        $nama_file = time()."_".$file->getClientOriginalName();
        $tujuan_upload = '/assets/img/uploads/';
        $file -> move($tujuan_upload,$nama_file);

        $data = new Blog();
        $data->foto = $nama_file;
        $data->judul = $request->judul;
        $data->keterangan = $request->keterangan;
        $data->tanggal = $request->tanggal;
        $data->slug = Str::slug($request->judul);
      
        $data->save();
        alert()->success('Data Blog Berhasil Ditambah', 'Berhasil!');
        return redirect('/admin/blog_admin');
    }

    public  function tampil_data(Request $request){
        if(!$request->session()->exists('admin')){
            alert()->error('Kamu Harus Login Dulu!', 'Peringatan!');
            return redirect('/admin/loginAdmin');
        }else{
    	    $datas = Blog::all()->sortByDesc('tanggal');         
            return view('admin.blog_admin',compact('datas'));  
        }   
    }

   public function ubah(Request $request, $id_blog) {
        if(!$request->session()->exists('admin')){
            alert()->error('Kamu Harus Login Dulu!', 'Peringatan!');
            return redirect('/admin/loginAdmin');
        }else{
            $datas = Blog::find($id_blog);
            return view('admin/UbahBlog',compact('datas'));
     }
    }

    public function update($id_blog, Request $request) {
        $this->validate($request, [
            'foto' => 'nullable|file|image|mimes:jpeg,png,jpg|max:2048',
            'judul' => 'required',
            'keterangan' => 'required',
            'tanggal' => 'required',
                  
        ]);

        $data = Blog::find($id_blog);
        $data->judul = $request->judul;
        $data->keterangan = $request->keterangan;
        $data->tanggal = $request->tanggal;
        $data->slug = Str::slug($request->judul);

        if (empty($request->foto)){
            $data->foto = $data->foto;
        }
        else{
            unlink('/assets/img/uploads/'.$data->foto); //menghapus file lama
            $file = $request->file('gambar'); // menyimpan data gambar yang diupload ke variabel $file
            $nama_file = time()."_".$file->getClientOriginalName();
            $file->move('uploads',$nama_file); // isi dengan nama folder tempat kemana file diupload
            $data->gambar = $nama_file;
        }
        $data->save();
        alert()->success('Data Blog Berhasil Diubah', 'Berhasil!');
        return redirect('admin/blog_admin');
    }

    public function delete($id_blog) {
        $datas = Blog::find($id_blog);
        $datas->delete();
        alert()->warning('Data Blog Berhasil Dihapus', 'Hapus!');
        return redirect('/admin/blog_admin');
    }

    public function semuaBlog(){
        $blog = Blog::orderBy('created_at', 'desc')->get();
        return view('layouts.blog', compact('blog')); 
    }

    public function detailBlog($slug){
        $blog = Blog::where('slug',$slug)->first();
        return view('layouts.detail_blog', compact('blog'));
    }
}
