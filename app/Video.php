<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Video extends Model
{
    protected $table = 'videos';
    protected $fillable = ['video', 'album_id'];

    const imgExt = ['jpeg','png','jpg','gif','svg',];
    const videoExt = ['mpeg','ogg','mp4','webm','3gp','mov','flv','avi','wmv','ts',];

    /**
     * @return BelongsTo
     */
    public function album()
    {
        return $this->belognsTo('App\Album', 'album_id');
    }
}
