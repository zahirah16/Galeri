<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use App\Models\Buku;
use Illuminate\Support\Facades\File; 
class BukuController extends Controller
{
   protected $dir = 'buku';

   public function index()
   {
   	$data = Buku::all();
   	return view($this->dir.'.index', compact('data'));
   }

   public function create()
   {
   	return view($this->dir.'.create');
   }

   public function store(Request $req)
   {
      // // menyimpan data file yang diupload ke variabel $file
      //  $file = $req->file('GambarBuku');
       
      //  if($file){
      //       $nama_file = time()."_".$file->getClientOriginalName();
      //       $tujuan_upload = 'gambar_Buku';
      //       $file->move($tujuan_upload,$nama_file);
      //  }
       


   	$simpan = new Buku;
   	$simpan->Judul = $req->Judul;  
      $simpan->Penulis = $req->Penulis;   
      $simpan->Penerbit = $req->Penerbit;
      $simpan->TahunTerbit = $req->TahunTerbit;
      // if($file){
      //    $simpan->GambarBuku = $nama_file;    
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
   	$data = Buku::find($id);
   	return view($this->dir.'.edit', compact('data'));
   }

    public function update(Request $req, $id)
   {
      // menyimpan data file yang diupload ke variabel $file
       // $file = $req->file('GambarBuku');
       // if($file){
       //   $nama_file = time()."_".$file->getClientOriginalName();
       
       //               // isi dengan nama folder tempat kemana file diupload
       //   $tujuan_upload = 'gambar_Buku';
       //   $file->move($tujuan_upload,$nama_file);  
       // }
       

      $simpan = Buku::find($id);
      $simpan->Judul = $req->Judul;  
      $simpan->Penulis = $req->Penulis;   
      $simpan->Penerbit = $req->Penerbit;
      $simpan->TahunTerbit = $req->TahunTerbit;
      // if($file){
      //    $simpan->GambarBuku = $nama_file;    
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
      $data = Buku::find($id);
      // return $data->GambarBuku;
      if($data->GambarBuku){
         $image_path = public_path('gambar_Buku').'/'.$data->GambarBuku;  // 
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
