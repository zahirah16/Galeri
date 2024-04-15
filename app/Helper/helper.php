<?php 

function tgl_indo($tgl){
	if($tgl!=''){
		return date('d-m-Y', strtotime($tgl));	
	}else {
		return '-';
	}
	
}

function tgl_indo_lengkap($tgl){
	if($tgl!=''){
		return date('d-m-Y H:i', strtotime($tgl));	
	}else {
		return '-';
	}
	
}

function kategori_buku($BukuID)
{
	$data = App\Models\KategoriBukuRelasi::where('BukuID', $BukuID)->get();
	if($data){
		$a = '';
		foreach ($data as $k) {
			$a .= $k->kategori->NamaKategori.', '; 
		}

		return $a;
	}
}

function user()
{
	$data = App\Models\User::find(session('UserID'));
	return $data;
}

function jumlah_komentar($foto_id) {
	@$data = App\Models\KomentarFoto::where('foto_id', $foto_id);
	return @$data->count();
}
function jumlah_like($foto_id) {
	@$data = App\Models\LikeFoto::where('foto_id', $foto_id);
	return @$data->count();
}
 ?>