<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Imagem extends Model
{
    protected $table = 'imagems';
    protected $fillable = ['imagem', 'category_id'];

    public function categoria()
    {
        return $this->belognsTo('App\ImagemCategoria', 'category_id');
    }
}
