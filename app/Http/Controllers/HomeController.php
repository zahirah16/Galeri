<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use App\Models\Foto;
Use App\Models\User;
Use App\Models\Peminjaman;
use Illuminate\Support\Facades\File; 
class HomeController extends Controller
{
	function index(Request $req)
	{
		$semua_foto = Foto::with('komentar')->get();
		
		return view('home.index', compact('semua_foto'));	
	}
}