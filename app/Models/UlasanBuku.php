<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class UlasanBuku extends Model
{
    protected $table = "ulasanbuku";
	protected $primaryKey = 'UlasanID';
    public $timestamps = false;

    public function user()
	{
	    return $this->belongsTo(User::class, 'UserID', 'UserID');
	}
}