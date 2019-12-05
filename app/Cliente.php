<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{

    protected $fillable = [
        'id',
        'nome',
        'tipo',
        'cpfcnpj',
        'status',
        'imagem',
        'email',
    ];
    public function endereco()
    {
        return $this->morphOne('App\Endereco', 'enderecoable');
    }
}
