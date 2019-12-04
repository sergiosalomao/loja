<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Empresa;
use App\Http\Requests\EmpresaRequest;
use Exception;
use App\Helpers\Validacao;

class EmpresaController extends Controller
{

    public function index(Request $request, Empresa $empresa)
    {
        
        $dados = $empresa->newQuery();
        if ($request->filled('nome_fantasia')) {
            $dados->where('nome_fantasia', 'like', '%' . $request->nome_fantasia . '%');
        }

        if ($request->filled('razao_social')) {
            $dados->where('razao_social', $request->razao_social);
        }

        if ($request->filled('cnpj')) {
            $dados->where('cnpj', $request->cnpj);
        }
        
        $dados = $dados->get();
        
        return response()->json($dados, 200);
        
    }


    public function store(EmpresaRequest $request)
    {
        $dados = $request->all();
        $cnpjValidado = Validacao::validaCNPJ($request->cnpj);

        // if (!$cnpjValidado) {
        //     return response()->json(['msg' => 'CNPJ invalido'], 200);
        // }

        try {
            Empresa::create($dados);
            return response()->json(['msg' => 'Dados salvos com sucesso', 'dados' => $dados], 200);
        } catch (Exception $e) {
            return response('Erro:' . $e->getMessage(), 500);
        }
    }

    public function show($id)
    {
        return response(['dados' => Empresa::findOrFail($id)]);
    }

    public function update(EmpresaRequest $request, $id)
    {
        $dados = $request->all();
        $cnpjValidado = Validacao::validaCNPJ($request->cnpj);

        // if (!$cnpjValidado) {
        //     return response()->json(['msg' => 'CNPJ invalido'], 200);
        // }

        try {
            $dados = Empresa::findOrFail($id);
            $dados->update($dados);
            return response()->json(['msg' => 'Dados atualizados com sucesso', 'dados' => $dados], 200);
        } catch (Exception $e) {
            return response('Erro:' . $e->getMessage(), 500);
        }
    }

    public function destroy($id)
    {
        try {
            $dados = Empresa::findOrFail($id);
            $dados->delete();
            return response()->json(['msg' => 'registro excluido com sucesso', 'dados' => $dados], 200);
        } catch (Exception $e) {
            return response('Erro:' . $e->getMessage(), 500);
        }
    }
}
