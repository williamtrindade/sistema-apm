<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Imagem extends Model
{
    protected $table = 'imagems';
    protected $fillable = ['imagem', 'album_id'];

    public function album()
    {
        return $this->belognsTo('App\Album', 'album_id');
    }
}
