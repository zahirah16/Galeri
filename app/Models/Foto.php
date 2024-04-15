<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Foto extends Model
{
    protected $table = "foto";
    public $timestamps = false;
    public function album()
	{
	    return $this->belongsTo(Album::class, 'album_id', 'id');
	}

    public function komentar()
	{
	    return $this->belongsTo(KomentarFoto::class, 'id', 'foto_id');
	}

    public function user()
	{
	    return $this->belongsTo(User::class, 'user_id', 'id');
	}

	public function like()
	{
	    return $this->belongsTo(LikeFoto::class, 'id', 'foto_id');
	}
}