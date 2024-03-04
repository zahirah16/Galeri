<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use App\Models\Buku;
Use App\Models\UlasanBuku;
Use App\Models\KategoriBuku;
Use App\Models\KategoriBukuRelasi;
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
    $kategori_buku = KategoriBuku::all();
   	return view($this->dir.'.create', compact('kategori_buku'));
   }

   public function store(Request $req)
   {
       

      $KategoriID = $req->KategoriID;


     	$simpan = new Buku;
     	$simpan->Judul = $req->Judul;  
      $simpan->Penulis = $req->Penulis;   
      $simpan->Penerbit = $req->Penerbit;
      $simpan->TahunTerbit = $req->TahunTerbit;
      // if($file){
      //    $simpan->GambarBuku = $nama_file;    
      // }
      
   	  $save = $simpan->save();
   	  


      if($KategoriID){
         foreach ($KategoriID as $k) {
           $rel = new KategoriBukuRelasi;
            $rel->BukuID = $simpan->BukuID;  
            $rel->KategoriID = $k;
            $rel->save();
         }
      }    

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
    $kategori_buku = KategoriBuku::all();
    $data_kategori = KategoriBukuRelasi::where('BukuID', $id)->get();
    $data_kategorinya = [];
    foreach ($data_kategori as $dk) {
      $data_kategorinya[] = $dk->KategoriID;
    }
   	return view($this->dir.'.edit', compact('data', 'kategori_buku', 'data_kategorinya'));
   }

    public function update(Request $req, $id)
   {
      $KategoriID = $req->KategoriID;   


      $simpan = Buku::find($id);
      $simpan->Judul = $req->Judul;  
      $simpan->Penulis = $req->Penulis;   
      $simpan->Penerbit = $req->Penerbit;
      $simpan->TahunTerbit = $req->TahunTerbit;
      // if($file){
      //    $simpan->GambarBuku = $nama_file;    
      // }
      $save = $simpan->save();

      KategoriBukuRelasi::where('BukuID', $id)->delete();
      
      if($KategoriID){
         foreach ($KategoriID as $k) {
           $rel = new KategoriBukuRelasi;
            $rel->BukuID = $simpan->BukuID;  
            $rel->KategoriID = $k;
            $rel->save();
         }
      }

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


   public function ulasan(Request $req, $id)
   {
     $data = Buku::find($id);
     $ulasan = UlasanBuku::where('BukuID', $id)->get();
     return view($this->dir.'.ulasan', compact('data', 'ulasan'));
   }

   public function ulasan_post(Request $req, $id)
   {
       

      $simpan = new UlasanBuku;
      $simpan->BukuID = $id;  
      $simpan->UserID = session('UserID');   
      $simpan->Ulasan = $req->Ulasan;
      $simpan->Rating = $req->Rating;
      // if($file){
      //    $simpan->GambarBuku = $nama_file;    
      // }
      
      $save = $simpan->save();
      


     

      if($save){
         return redirect()->back()->with('message','Data berhasil ditambahkan');
    }else {
         return redirect()->back()->with('error','Data gagal ditambahkan');
      // return "error";
    }
   }


   public function hapus_ulasan($id)
   {
      $data = UlasanBuku::find($id);
      $delete = $data->delete();
      if($delete) {
         return redirect()->back()->with('message','Data berhasil dihapus');
      }else {
         return redirect()->back()->with('error','Data gagal dihapus');
      }
   }
}
