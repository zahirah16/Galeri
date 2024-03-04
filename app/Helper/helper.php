<?php 

function tgl_indo($tgl){
	if($tgl!=''){
		return date('d-m-Y', strtotime($tgl));	
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

function rating($BukuID)
{
	$data = App\Models\UlasanBuku::where('BukuID', $BukuID)->get();
	$jumlah = @$data->count();
	$sum = $data->sum('Rating');
	@$rating = (float) ($sum / $jumlah);
	if(is_nan($rating)){
		$rating = 0.0;
	}
	return $rating . ' ('.$jumlah.' ulasan)';
}

function user()
{
	$data = App\Models\User::find(session('UserID'));
	return $data;
}

 ?>