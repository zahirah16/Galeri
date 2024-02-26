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

}