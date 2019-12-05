<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;


class ServicoRequest extends FormRequest
{
    
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'descricao'     => 'required',
            'categoria'     => 'required|unique:servicos',
        ];
    }

    public function messages()
    {
        return [
            'nome.required'     => 'Nome é Obrigatório',
            'categoria.required'     => 'Categoria é Obrigatório',
            'categoria.unique'     => 'Categoria ja cadastrada',
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json($validator->errors(), 422));
    }
}