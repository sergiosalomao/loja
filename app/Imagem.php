<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Imagem extends Model
{
    protected $table = 'imagens';

    protected $fillable = [
        'texto',
        'path',
        'visualizacoes'
    ];

    public function imagemable()
    {
        return $this->morphTo();
    }
}
