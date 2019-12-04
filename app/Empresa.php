<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Empresa extends Model
{
    protected $fillable = [
        'id',
        'nome_fantasia',
        'razao_social',
        'cnpj',
        'cep',
        'logradouro',
        'bairro',
        'numero',
        'complemento',
        'cidade',
        'uf',
        'categoria',
        'imagem',
        'status',
        'email',
        'website'
    ];

    public function setEmailAttribute($value)
    {
        $this->attributes['email'] = strtolower($value);
    }

    public function setWebSiteAttribute($value)
    {
        $this->attributes['website'] = strtolower($value);
    }
    
}
