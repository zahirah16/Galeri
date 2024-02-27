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

 ?>