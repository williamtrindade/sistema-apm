<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    protected $table = 'albums';
    protected $fillable = ['nome', 'descricao', 'nivel', 'owner_album_id'];

    public function imagens()
    {
        return $this->hasMany('App\Imagem');
    }

    // Pode ser NULL
    public function ownerAlbum()
    {
        return $this->belongsTo('App\Album', 'owner_album_id');
    }

    public function albums()
    {
        return $this->hasMany('App\Album', 'owner_album_id');
    }
}
