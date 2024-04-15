<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use App\Models\User;
use Illuminate\Support\Facades\Hash;

class ProfilController extends Controller
{
	function index(Request $req)
	{
		$data = User::find(session('UserID'));
		return view('profil.index', compact('data'));	
	}

    public function update(Request $req, $id)
   {
      $simpan = User::find($id);
      $simpan->nama_lengkap = $req->nama_lengkap; 
      $simpan->username = $req->username;  
      $simpan->email = $req->email;  
      $simpan->alamat = $req->alamat;
      if($req->password){
         $simpan->password = Hash::make($req->password);
      } 
      $save = $simpan->save();
      if($save){
         return redirect()->back()->with('message','Data berhasil dirubah');
      }else {
         return redirect()->back()->with('error','Data gagal ditambahkan');
      }
   }
}