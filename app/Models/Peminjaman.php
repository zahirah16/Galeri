<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Peminjaman extends Model
{
    protected $table = "peminjaman";
	protected $primaryKey = 'PeminjamanID';
    public $timestamps = false;

    public function buku()
	{
	    return $this->belongsTo(Buku::class, 'BukuID', 'BukuID');
	}

	public function user()
	{
	    return $this->belongsTo(User::class, 'UserID', 'UserID');
	}
}