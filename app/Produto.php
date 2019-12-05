<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    protected $fillable = ['descricao', 'valor', 'fabricante_id', 'informacoes'];


    public function imagem()
    {
        return $this->morphMany('App\Imagem', 'imagemable');
    }
}
