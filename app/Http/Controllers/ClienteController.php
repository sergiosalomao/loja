<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cliente;
use App\Http\Requests\ClienteRequest;
use Exception;
use App\Helpers\Validacao;
use App\Endereco;

class ClienteController extends Controller
{
  
    public function index(Request $request, Cliente $cliente)
    {
        $dados = $cliente->newQuery();
        if ($request->filled('nome')) {
            $dados->where('nome', 'like', '%' . $request->nome . '%');
        }

        if ($request->filled('cpfcnpj')) {
            $dados->where('cpfcnpj', $request->cpfcnpj);
        }
        
        $dados = $dados->with(['endereco'])->get();
        
        return response()->json($dados, 200);
        
    }

    public function store(ClienteRequest $request)
    {
        $dados = $request->all();
        try {
            $cliente = Cliente::create($dados);
            $endereco = new Endereco($request->all());
            $cliente->endereco()->save($endereco);
            return response()->json(['msg' => 'Dados salvos com sucesso', 'dados' => $dados], 200);
        } catch (Exception $e) {
            return response('Erro:' . $e->getMessage(), 500);
        }
    }

    public function show($id)
    {
        return response(['dados' => Cliente::findOrFail($id)]);
    }

    public function update(EmpresaRequest $request, $id)
    {
        $dados = $request->all();

        try {
            $dados = Cliente::findOrFail($id);
            $dados->update($dados);
            return response()->json(['msg' => 'Dados atualizados com sucesso', 'dados' => $dados], 200);
        } catch (Exception $e) {
            return response('Erro:' . $e->getMessage(), 500);
        }
    }

    public function destroy($id)
    {
        try {
            $dados = Cliente::findOrFail($id);
            $dados->delete();
            return response()->json(['msg' => 'registro excluido com sucesso', 'dados' => $dados], 200);
        } catch (Exception $e) {
            return response('Erro:' . $e->getMessage(), 500);
        }
    }
}

