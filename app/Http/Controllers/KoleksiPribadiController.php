<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use App\Models\KoleksiPribadi;
Use App\Models\Buku;
use Illuminate\Support\Facades\File; 
class KoleksiPribadiController extends Controller
{
   protected $dir = 'koleksi_pribadi';

   public function index()
   {
   	$data = KoleksiPribadi::where('UserID', session('UserID'))->get();
   	return view($this->dir.'.index', compact('data'));
   }

   public function create()
   {
    $buku = Buku::all();
   	return view($this->dir.'.create', compact('buku'));
   }

   public function store(Request $req)
   {
      // // menyimpan data file yang diupload ke variabel $file
      //  $file = $req->file('GambarKoleksiPribadi');
       
      //  if($file){
      //       $nama_file = time()."_".$file->getClientOriginalName();
      //       $tujuan_upload = 'gambar_KoleksiPribadi';
      //       $file->move($tujuan_upload,$nama_file);
      //  }
       


   	$simpan = new KoleksiPribadi;
   	$simpan->BukuID = $req->BukuID;
    $simpan->UserID = session('UserID'); 
      // if($file){
      //    $simpan->GambarKoleksiPribadi = $nama_file;    
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
   	$data = KoleksiPribadi::find($id);
    $buku = Buku::all();
   	return view($this->dir.'.edit', compact('data', 'buku'));
   }

    public function update(Request $req, $id)
   {
      // menyimpan data file yang diupload ke variabel $file
       // $file = $req->file('GambarKoleksiPribadi');
       // if($file){
       //   $nama_file = time()."_".$file->getClientOriginalName();
       
       //               // isi dengan nama folder tempat kemana file diupload
       //   $tujuan_upload = 'gambar_KoleksiPribadi';
       //   $file->move($tujuan_upload,$nama_file);  
       // }
       

      $simpan = KoleksiPribadi::find($id);
      $simpan->NamaKategori = $req->NamaKategori;  
      // if($file){
      //    $simpan->GambarKoleksiPribadi = $nama_file;    
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
      $data = KoleksiPribadi::find($id);
      // return $data->GambarKoleksiPribadi;
      if($data->GambarKoleksiPribadi){
         $image_path = public_path('gambar_KoleksiPribadi').'/'.$data->GambarKoleksiPribadi;  // 
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
