<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Endereco extends Model
{
    protected $fillable = [
        'id',
        'cep',
        'logradouro',
        'bairro',
        'numero',
        'complemento',
        'cidade',
        'uf'
        
    ];

    public function enderecoable()
    {
        return $this->morphTo();
    }

    
}
