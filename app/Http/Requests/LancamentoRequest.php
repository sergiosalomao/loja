<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;


class LancamentoRequest extends FormRequest
{
    
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'tipo'     => 'required',
            'produto_id'     => 'required',
            'quantidade'     => 'required',
        ];
    }

    public function messages()
    {
        return [
            'tipo.required'     => 'tipo é Obrigatório',
            'produto_id.required'     => 'Produto é Obrigatório',
            'quantidade.required'     => 'Quantidade é Obrigatório',
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json($validator->errors(), 422));
    }
}