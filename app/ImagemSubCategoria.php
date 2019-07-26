<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ImagemSubCategoria extends Model
{
    protected $table = 'imagem_categorias';
    protected $fillable = ['nome', 'descricao'];
    
    public function imagens()
    {
        return $this->hasMany('App\Imagem', 'sub_category_id');
    }

    public function categoria()
    {
        return $this->belongsTo('App\ImagemCategoria');
    }
}
