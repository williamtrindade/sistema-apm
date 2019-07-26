<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ImagemCategoria extends Model
{
    protected $table = 'imagem_categorias';
    protected $fillable = ['nome'];

    public function subCategorias()
    {
        return $this->hasMany('App\ImagemSubCategoria', 'category_id');
    }
}
