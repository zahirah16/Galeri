<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use App\Models\KategoriBuku;
use Illuminate\Support\Facades\File; 
class KategoriBukuController extends Controller
{
   protected $dir = 'kategori_buku';

   public function index()
   {
   	$data = KategoriBuku::all();
   	return view($this->dir.'.index', compact('data'));
   }

   public function create()
   {
   	return view($this->dir.'.create');
   }

   public function store(Request $req)
   {
      // // menyimpan data file yang diupload ke variabel $file
      //  $file = $req->file('GambarKategoriBuku');
       
      //  if($file){
      //       $nama_file = time()."_".$file->getClientOriginalName();
      //       $tujuan_upload = 'gambar_KategoriBuku';
      //       $file->move($tujuan_upload,$nama_file);
      //  }
       


   	$simpan = new KategoriBuku;
   	$simpan->NamaKategori = $req->NamaKategori; 
      // if($file){
      //    $simpan->GambarKategoriBuku = $nama_file;    
      // }
      
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
   	$data = KategoriBuku::find($id);
   	return view($this->dir.'.edit', compact('data'));
   }

    public function update(Request $req, $id)
   {
      // menyimpan data file yang diupload ke variabel $file
       // $file = $req->file('GambarKategoriBuku');
       // if($file){
       //   $nama_file = time()."_".$file->getClientOriginalName();
       
       //               // isi dengan nama folder tempat kemana file diupload
       //   $tujuan_upload = 'gambar_KategoriBuku';
       //   $file->move($tujuan_upload,$nama_file);  
       // }
       

      $simpan = KategoriBuku::find($id);
      $simpan->NamaKategori = $req->NamaKategori;  
      // if($file){
      //    $simpan->GambarKategoriBuku = $nama_file;    
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
      $data = KategoriBuku::find($id);
      // return $data->GambarKategoriBuku;
      if($data->GambarKategoriBuku){
         $image_path = public_path('gambar_KategoriBuku').'/'.$data->GambarKategoriBuku;  // 
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
