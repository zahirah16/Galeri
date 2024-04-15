<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use App\Models\Foto;
Use App\Models\Album;
use Illuminate\Support\Facades\File; 
Use App\Models\KomentarFoto;
Use App\Models\LikeFoto;

class FotoController extends Controller
{
   protected $dir = 'foto';

   public function index()
   {
   	$data = Foto::where('user_id', session('UserID'))->get();
   	return view($this->dir.'.index', compact('data'));
   }

   public function create()
   {
      $album = Album::where('user_id', session('UserID'))->get();
   	return view($this->dir.'.create', compact('album'));
   }

   public function store(Request $req)
   {
       

      $album = $req->album;

       $file = $req->file('lokasi_file');
       if($file){
         $nama_file = time()."_".$file->getClientOriginalName();
       
                     // isi dengan nama folder tempat kemana file diupload
         $tujuan_upload = 'foto_galeri';
         $file->move($tujuan_upload,$nama_file);  
         $lokasi = $tujuan_upload.'/'.$nama_file;
      }
       


     	$simpan = new Foto;
     	$simpan->judul_foto = $req->judul_foto;  
      $simpan->deskripsi_foto = $req->deskripsi_foto;   
      if($file){
         $simpan->lokasi_file = $lokasi;    
      }
      $simpan->album_id = $req->album;
      $simpan->user_id = @session('UserID');
      
      $save = $simpan->save();   

      if($save){
         return redirect()->to($this->dir.'')->with('message','Data berhasil ditambahkan');
   		// return redirect()->to('mobil');
   	}else {
         return redirect()->back()->with('error','Data gagal ditambahkan');
   		// return "error";
   	}
   }

   public function edit($id)
   {
   	$data = Foto::find($id);
      $album = Album::where('user_id', session('UserID'))->get();
      return view($this->dir.'.edit', compact('data', 'album'));
   }

    public function update(Request $req, $id)
   {
      $album = $req->album;

       $file = $req->file('lokasi_file');
       if($file){
         $nama_file = time()."_".$file->getClientOriginalName();
         $tujuan_upload = 'foto_galeri';
         $file->move($tujuan_upload,$nama_file);  
         $lokasi = $tujuan_upload.'/'.$nama_file;
      }
       


     	$simpan = Foto::find($id);
     	$simpan->judul_foto = $req->judul_foto;  
      $simpan->deskripsi_foto = $req->deskripsi_foto;   
      if($file){
         $simpan->lokasi_file = $lokasi;    
      }
      $simpan->album_id = $req->album;

      $save = $simpan->save();   

      if($save){
         return redirect()->to($this->dir.'')->with('message','Data berhasil dirubah');
         // return redirect()->to('mobil');
      }else {
         return redirect()->back()->with('error','Data gagal ditambahkan');
         // return "error";
      }
   }

   public function destroy($id)
   {
      $data = Foto::find($id);
      // return $data->GambarFoto;
      if($data->lokasi_file){
         $image_path = public_path($data->lokasi_file);  // 
         if(File::exists($image_path)) {
             File::delete($image_path);
         }   
      }
      

      $delete = $data->delete();
      if($delete) {
         return redirect()->back()->with('message','Data berhasil dihapus');
         // return redirect()->to('mobil');
      }else {
         return redirect()->back()->with('error','Data gagal dihapus');
         // return "Gagal menghapus";
      }
   }


   public function detail(Request $req, $id)
   {
     $data = Foto::find($id);
     $komentar = KomentarFoto::where('foto_id', $id)->get();
     $sudah_like = LikeFoto::where('foto_id', $id)->where('user_id', session('UserID'))->first();
     return view($this->dir.'.ulasan', compact('data', 'komentar', 'sudah_like'));
   }

   public function komentar_post(Request $req, $id)
   {
      $simpan = new KomentarFoto;
      $simpan->foto_id = $id;  
      $simpan->user_id = session('UserID');   
      $simpan->isi_komentar = $req->komentar;
      $save = $simpan->save();
      
      if($save){
         return redirect()->back()->with('message','Data berhasil ditambahkan');
      }else {
            return redirect()->back()->with('error','Data gagal ditambahkan');
      }
   }

   public function like_post(Request $req, $id)
   {
      $tipe = $req->tipe;
      if($tipe==1){
         $simpan = new LikeFoto;
         $simpan->foto_id = $id;  
         $simpan->user_id = session('UserID');
         $save = $simpan->save();
      }else {
         $simpan = LikeFoto::where('user_id', session('UserID'))->where('foto_id', $id);
         $save = $simpan->delete();
      }
      
      
      if($save){
         return redirect()->back()->with('message','Data berhasil ditambahkan');
      }else {
            return redirect()->back()->with('error','Data gagal ditambahkan');
      }
   }


   public function hapus_komentar($id)
   {
      $data = KomentarFoto::find($id);
      $delete = $data->delete();
      if($delete) {
         return redirect()->back()->with('message','Data berhasil dihapus');
      }else {
         return redirect()->back()->with('error','Data gagal dihapus');
      }
   }
}
