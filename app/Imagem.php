<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Imagem extends Model
{
    protected $table = 'imagems';
    protected $fillable = ['imagem', 'album_id'];

    const imgExt = ['jpeg','png','jpg','gif','svg',];
    const videoExt = ['mpeg','ogg','mp4','webm','3gp','mov','flv','avi','wmv','ts',];

    /**
     * @return mixed
     */
    public function album()
    {
        return $this->belognsTo('App\Album', 'album_id');
    }
}
