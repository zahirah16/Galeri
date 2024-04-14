<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use App\Models\Album;
use Illuminate\Support\Facades\File; 
class AlbumController extends Controller
{
   protected $dir = 'album';

   public function index()
   {
   	$data = Album::where('user_id', session('UserID'))->get();
   	return view($this->dir.'.index', compact('data'));
   }

   public function create()
   {
   	return view($this->dir.'.create');
   }

   public function store(Request $req)
   {
      // // menyimpan data file yang diupload ke variabel $file
      //  $file = $req->file('GambarAlbum');
       
      //  if($file){
      //       $nama_file = time()."_".$file->getClientOriginalName();
      //       $tujuan_upload = 'gambar_Album';
      //       $file->move($tujuan_upload,$nama_file);
      //  }
       


   	$simpan = new Album;
   	$simpan->nama_album = $req->nama_album;
      $simpan->deskripsi = $req->deskripsi;
      $simpan->user_id = session('UserID');
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
   	$data = Album::find($id);
   	return view($this->dir.'.edit', compact('data'));
   }

    public function update(Request $req, $id)
   {
      // menyimpan data file yang diupload ke variabel $file
       // $file = $req->file('GambarAlbum');
       // if($file){
       //   $nama_file = time()."_".$file->getClientOriginalName();
       
       //               // isi dengan nama folder tempat kemana file diupload
       //   $tujuan_upload = 'gambar_Album';
       //   $file->move($tujuan_upload,$nama_file);  
       // }
       

      $simpan = Album::find($id);
      $simpan->nama_album = $req->nama_album;
      $simpan->deskripsi = $req->deskripsi;
      // if($file){
      //    $simpan->GambarAlbum = $nama_file;    
      // }
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
      $data = Album::find($id);
      // return $data->GambarAlbum;
      if($data->GambarAlbum){
         $image_path = public_path('gambar_Album').'/'.$data->GambarAlbum;  // 
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
}
