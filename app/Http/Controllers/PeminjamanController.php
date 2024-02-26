<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use App\Models\Peminjaman;
Use App\Models\Buku;
Use App\Models\User;
use Illuminate\Support\Facades\File; 
class PeminjamanController extends Controller
{
   protected $dir = 'peminjaman';

   public function index()
   {
   	$data = Peminjaman::all();
   	return view($this->dir.'.index', compact('data'));
   }

   public function create()
   {
    $user = User::all();
    $buku = Buku::all();
   	return view($this->dir.'.create', compact('user', 'buku'));
   }

   public function store(Request $req)
   {
      // // menyimpan data file yang diupload ke variabel $file
      //  $file = $req->file('GambarPeminjaman');
       
      //  if($file){
      //       $nama_file = time()."_".$file->getClientOriginalName();
      //       $tujuan_upload = 'gambar_Peminjaman';
      //       $file->move($tujuan_upload,$nama_file);
      //  }
       


   	$simpan = new Peminjaman;
   	$simpan->UserID = $req->UserID;  
      $simpan->BukuID = $req->BukuID;   
      $simpan->TanggalPeminjaman = $req->TanggalPeminjaman;
      $simpan->TanggalPengembalian = $req->TanggalPengembalian;
      $simpan->StatusPeminjaman = $req->StatusPeminjaman;
      // if($file){
      //    $simpan->GambarPeminjaman = $nama_file;    
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
    $user = User::all();
    $buku = Buku::all();
   	$data = Peminjaman::find($id);
   	return view($this->dir.'.edit', compact('data', 'user', 'buku'));
   }

    public function update(Request $req, $id)
   {
      // menyimpan data file yang diupload ke variabel $file
       // $file = $req->file('GambarPeminjaman');
       // if($file){
       //   $nama_file = time()."_".$file->getClientOriginalName();
       
       //               // isi dengan nama folder tempat kemana file diupload
       //   $tujuan_upload = 'gambar_Peminjaman';
       //   $file->move($tujuan_upload,$nama_file);  
       // }
       

      $simpan = Peminjaman::find($id);
      $simpan->UserID = $req->UserID;  
      $simpan->BukuID = $req->BukuID;   
      $simpan->TanggalPeminjaman = $req->TanggalPeminjaman;
      $simpan->TanggalPengembalian = $req->TanggalPengembalian;
      $simpan->StatusPeminjaman = $req->StatusPeminjaman;
      // if($file){
      //    $simpan->GambarPeminjaman = $nama_file;    
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
      $data = Peminjaman::find($id);
      // return $data->GambarPeminjaman;
      if($data->GambarPeminjaman){
         $image_path = public_path('gambar_Peminjaman').'/'.$data->GambarPeminjaman;  // 
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
