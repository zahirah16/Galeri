<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class KategoriBukuRelasi extends Model
{
    protected $table = "kategoribuku_relasi";
	protected $primaryKey = 'KategoriBukuID';
    public $timestamps = false;

    public function kategori()
	{
	    return $this->belongsTo(KategoriBuku::class, 'KategoriID', 'KategoriID');
	}
}