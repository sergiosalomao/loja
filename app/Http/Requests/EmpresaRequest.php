<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;

class EmpresaRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    public function rules()
    {

        return [

            'nome_fantasia'     => 'required',
            'razao_social'      => 'required',
            'cnpj'              => 'required|unique:empresas|min:14',
            'cep'               => 'required',
            'logradouro'        => 'required',
            'bairro'            => 'required',
            'numero'            => 'required',
            'complemento'       => 'required',
            'cidade'            => 'required',
            'uf'                => 'required',
            'categoria'         => 'required',
            'status'            => 'required',
            'email'             => 'required',
        ];
    }

    public function messages()
    {
        return [
            'nome_fantasia.required'     => 'Nome Fantasia Obrigatório',
            'razao_social.required'      => 'razão social obrigatório',
            'cnpj.required'              => 'cnpj obrigatório',
            'cnpj.unique'                => 'Este cnpj ja foi cadastrado',
            'cnpj.min'                   => 'CNPJ inválido',
            'cep.required'               => 'cep obrigatório',
            'logradouro.required'        => 'logradouro obrigatório',
            'bairro.required'            => 'bairro obrigatório',
            'numero.required'            => 'numero obrigatório',
            'complemento.required'       => 'complemento obrigatório',
            'cidade.required'            => 'cidade obrigatório',
            'uf.required'                => 'uf obrigatório',
            'categoria.required'         => 'categoria obrigatório',
            'status.required'            => 'status obrigatório',
            'email.required'             => 'email obrigatório',

        ];
    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json($validator->errors(), 422));
    }
}
