<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class KoleksiPribadi extends Model
{
    protected $table = "koleksipribadi";
	protected $primaryKey = 'KoleksiID';
    public $timestamps = false;

    public function buku()
	{
	    return $this->belongsTo(Buku::class, 'BukuID', 'BukuID');
	}
}