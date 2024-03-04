<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use App\Models\User;
use Session;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
   public function index()
   {
   	return view('login.index');
   }


   public function login_proses(Request $req)
   {
      $username = $req->Username;
      $password = $req->Password;

      $user = User::where('Username', $username)->first();
      if($user){
         if (Hash::check($password, $user->Password)) {
               $req->session()->put('UserID',$user->UserID);
               $req->session()->put('Level',$user->Level);

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

      $username = $req->Username;
      $password = $req->Password;

      $user = User::where('Username', $username)->first();
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
         $new->NamaLengkap = $req->NamaLengkap;
         $new->Email = $req->Email;
         $new->Alamat = $req->Alamat;
         $new->Username = $req->Username;
         $new->Level = 'Peminjam';
         $new->Password = Hash::make($req->Password);

         $save = $new->save();

         if($save){
            $req->session()->put('UserID',$new->UserID);
            $req->session()->put('Level',$new->Level);
            return redirect('/home');
         }else{
             return redirect()->back()->with('error','Terjadi Kesalahan!');
         }

      }
   }

   

}