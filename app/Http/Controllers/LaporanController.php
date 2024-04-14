<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use App\Models\Peminjaman;
Use App\Models\Buku;
Use App\Models\User;
    use Barryvdh\DomPDF\Facade\Pdf;

use Illuminate\Support\Facades\File; 
class LaporanController extends Controller
{
   protected $dir = 'laporan';

   public function index(Request $req)
   {
    // $user = User::all();
    // $buku = Buku::all();
    $dari_tanggal = @$req->dari_tanggal;
    $sampai_tanggal = @$req->sampai_tanggal;
    if($dari_tanggal!='' && $sampai_tanggal!=''){
      $data = Peminjaman::whereDate('TanggalPeminjaman', '>=', $dari_tanggal)->whereDate('TanggalPeminjaman', '<=', $sampai_tanggal)->get();
    }else {
      $data = null;
    }
   	return view($this->dir.'.index', compact('data'));
   }

   public function pdf(Request $req)
   {
     $dari_tanggal = @$req->dari_tanggal;
      $sampai_tanggal = @$req->sampai_tanggal;
      if($dari_tanggal!='' && $sampai_tanggal!=''){
        $data = Peminjaman::whereDate('TanggalPeminjaman', '>=', $dari_tanggal)->whereDate('TanggalPeminjaman', '<=', $sampai_tanggal)->get();
      }else {
        $data = null;
      }
      // return view($this->dir.'.index', compact('data'));
      $pdf = Pdf::loadView($this->dir.'.pdf', compact('data'));
      return $pdf->stream('peminjaman.pdf');
   }
}
