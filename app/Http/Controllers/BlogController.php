<?php

namespace App\Http\Controllers;

use File;
use Str;
use App\Blog;
use Carbon\Carbon;
use Illuminate\Http\Request;

class BlogController extends Controller
{

    public function tambah(){
        if(!session()->exists('admin')){
            alert()->error('Kamu Harus Login Dulu!', 'Peringatan!');
            return redirect('/admin/loginAdmin');
        }else{
            return view('admin.TambahBlog');
        }
    }

    public function store(Request $request){
        $request->validate([
            'foto'          => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'judul'         => 'required',
            'keterangan'    => 'required'
        ],
        [
            'judul.required'        => 'Judul harus diisi',
            'foto.required'         => 'Foto harus diisi',
            'foto.uploaded'         => 'Ukuran foto tidak boleh lebih dari 2MB',
            'foto.mimes'            => 'Format foto harus jpeg atau jpg atau png',
            'keterangan.required'   => 'Keterangan harus diisi'
        ]);

        $file           = $request->file('foto');
        $nama_file      = time()."_".$file->getClientOriginalName();
        $tujuan_upload  = '/assets/img/uploads/';
        $file->move($tujuan_upload,$nama_file);

        $data = new Blog();
        $data->foto         = $nama_file;
        $data->judul        = $request->judul;
        $data->keterangan   = $request->keterangan;
        $data->tanggal      = Carbon::today()->toDateString();
        $data->slug         = Str::slug($request->judul);
      
        $data->save();
        alert()->success('Data Blog Berhasil Ditambah', 'Berhasil!');
        return redirect('/admin/blog_admin');
    }

    public function dataBlog(){
        if(!session()->exists('admin')){
            alert()->error('Kamu Harus Login Dulu!', 'Peringatan!');
            return redirect('/admin/loginAdmin');
        }else{
    	    $datas = Blog::all()->sortByDesc('tanggal');         
            return view('admin.blog_admin',compact('datas'));  
        }   
    }

   public function ubah($id_blog) {
        if(!session()->exists('admin')){
            alert()->error('Kamu Harus Login Dulu!', 'Peringatan!');
            return redirect('/admin/loginAdmin');
        }else{
            $datas = Blog::find($id_blog);
            return view('admin/UbahBlog',compact('datas'));
        }
    }

    public function update($id_blog, Request $request) {
        $request->validate([
            'foto'          => 'file|image|mimes:jpeg,png,jpg|max:2048',
            'judul'         => 'required|string',
            'keterangan'    => 'required|string'
        ],
        [
            'judul.required'        => 'Judul harus diisi',
            'foto.required'         => 'Foto harus diisi',
            'foto.uploaded'         => 'Ukuran foto tidak boleh lebih dari 2MB',
            'foto.mimes'            => 'Format foto harus jpeg atau jpg atau png',
            'keterangan.required'   => 'Keterangan harus diisi'
        ]);

        $data = Blog::find($id_blog);
        $data->judul        = $request->judul;
        $data->keterangan   = $request->keterangan;
        $data->slug         = Str::slug($request->judul);

        if(empty($request->foto)){
            $data->foto = $data->foto;
        }
        else{
            unlink('/assets/img/uploads/'.$data->foto); //menghapus file lama
            $file       = $request->file('gambar'); // menyimpan data gambar yang diupload ke variabel $file
            $nama_file  = time()."_".$file->getClientOriginalName();
            $file->move('uploads',$nama_file); // isi dengan nama folder tempat kemana file diupload
            $data->gambar = $nama_file;
        }
        $data->save();
        alert()->success('Data Blog Berhasil Diubah', 'Berhasil!');
        return redirect('admin/blog_admin');
    }

    public function delete($id_blog) {
        $datas = Blog::find($id_blog);
        File::delete('assets/img/uploads'.$datas->foto);
        $datas->delete();
        alert()->warning('Data Blog Berhasil Dihapus', 'Hapus!');
        return redirect('/admin/blog_admin');
    }

    public function blogPage(){
        $blog = Blog::orderBy('created_at', 'desc')->get();
        return view('layouts.blog', compact('blog')); 
    }

    public function detailBlog($slug){
        $blog = Blog::where('slug',$slug)->first();
        return view('layouts.detail_blog', compact('blog'));
    }
}
