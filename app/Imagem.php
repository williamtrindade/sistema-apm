<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Imagem extends Model
{
    protected $table = 'imagems';
    protected $fillable = ['imagem', 'category_id'];

    public function subCategoria()
    {
        return $this->belognsTo('App\ImagemSubCategoria');
    }
}
