<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use App\Models\User;
use Hash;

class UserController extends Controller
{
   protected $dir = 'user';

   public function index()
   {
   	$data = User::all();
   	return view($this->dir.'.index', compact('data'));
   }

   public function create()
   {
   	return view($this->dir.'.create');
   }

   public function store(Request $req)
   {
   	$simpan = new User;
   	$simpan->NamaLengkap = $req->NamaLengkap; 
      $simpan->Username = $req->Username;  
      $simpan->Email = $req->Email;   
      $simpan->Password = Hash::make($req->Password);
      $simpan->Alamat = $req->Alamat;
      $simpan->Level = $req->Level;
   	$save = $simpan->save();
   	if($save){
         return redirect()->to($this->dir.'')->with('message','Data berhasil ditambahkan');
   	}else {
         return redirect()->back()->with('error','Data gagal ditambahkan');
   	}
   }

   public function edit($id)
   {
   	$data = User::find($id);
   	return view($this->dir.'.edit', compact('data'));
   }

    public function update(Request $req, $id)
   {
      $simpan = User::find($id);
      $simpan->NamaLengkap = $req->NamaLengkap; 
      $simpan->Username = $req->Username;  
      $simpan->Email = $req->Email;  
      $simpan->Alamat = $req->Alamat;
      $simpan->Level = $req->Level;
      if($req->Password){
         $simpan->Password = Hash::make($req->Password);
      } 
      $save = $simpan->save();
      if($save){
         return redirect()->to($this->dir.'')->with('message','Data berhasil dirubah');
      }else {
         return redirect()->back()->with('error','Data gagal ditambahkan');
      }
   }

   public function destroy($id)
   {
      $data = User::find($id);
      $delete = $data->delete();
      if($delete) {
         return redirect()->back()->with('message','Data berhasil dihapus');
      }else {
         return redirect()->back()->with('error','Data gagal dihapus');
      }
   }
}
