<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use App\Models\Buku;
Use App\Models\User;
Use App\Models\Peminjaman;
use Illuminate\Support\Facades\File; 
class HomeController extends Controller
{
	function index(Request $req)
	{
		$buku = Buku::all()->count();
		$user = User::all()->count();
		$peminjaman = Peminjaman::all()->count();
		return view('home.index', compact('buku', 'user', 'peminjaman'));	
	}
}