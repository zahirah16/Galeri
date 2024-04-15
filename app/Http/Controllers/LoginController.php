<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use App\Models\User;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
   public function index()
   {
   	return view('login.index');
   }


   public function login_proses(Request $req)
   {
      $username = $req->username;
      $password = $req->password;

      $user = User::where('username', $username)->first();
      if($user){
         if (Hash::check($password, $user->password)) {
               $req->session()->put('UserID',$user->id);

               return redirect('/home');
         }else{
             return redirect()->back()->with('error','Password yang anda masukkan salah!');
         }
      }else {
         return redirect()->back()->with('error','Username anda tidak ditemukan!');
      }
   }

   public function logout()
   {
   	Session::forget('UserID');
   	Session::forget('Level');
   	return redirect('login');
   }

   public function register()
   {
      return view('login.register');
   }

    public function register_proses(Request $req)
   {  

      $username = $req->username;
      $password = $req->password;

      $user = User::where('username', $username)->first();
      if($user){
         return redirect()->back()->with('error','Username sudah digunakan!');
         // if (Hash::check($password, $user->Password)) {
         //       $req->session()->put('UserID',$user->UserID);
         //       $req->session()->put('Level',$user->Level);

         //       return redirect('/home');
         // }else{
         //     return redirect()->back()->with('error','Password yang anda masukkan salah!');
         // }
      }else {
         $new = new User;
         $new->nama_lengkap = $req->nama_lengkap;
         $new->email = $req->email;
         $new->alamat = $req->alamat;
         $new->username = $req->username;
         $new->password = Hash::make($req->password);

         $save = $new->save();

         if($save){
            $req->session()->put('UserID',$new->id);
            return redirect('/home');
         }else{
             return redirect()->back()->with('error','Terjadi Kesalahan!');
         }

      }
   }

   

}