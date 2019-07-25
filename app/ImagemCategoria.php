<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ImagemCategoria extends Model
{
    protected $table = 'imagem_categorias';
    protected $fillable = ['nome'];

    public function imagens()
    {
        return $this->hasMany('App\Imagem', 'category_id');
    }
}
