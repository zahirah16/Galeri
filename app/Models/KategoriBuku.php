<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class KategoriBuku extends Model
{
    protected $table = "kategori_buku";
	protected $primaryKey = 'KategoriID';
    public $timestamps = false;
}