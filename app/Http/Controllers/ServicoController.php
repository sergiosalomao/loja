<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Servico;
use App\Http\Requests\ServicoRequest;
use Exception;


class ServicoController extends Controller
{

    public function index(Request $request, Servico $servico)
    {
        
        $dados = $servico->newQuery();
        if ($request->filled('descricao')) {
            $dados->where('descricao', 'like', '%' . $request->descricao . '%');
        }

        if ($request->filled('categoria')) {
            $dados->where('categoria', $request->categoria);
        }

        $dados = $dados->get();
        
        return response()->json($dados, 200);
        
    }


    public function store(ServicoRequest $request)
    {
        $dados = $request->all();
        
        try {
            $servico = Servico::create($dados);
            $servico->save($dados);
            return response()->json(['msg' => 'Dados salvos com sucesso', 'dados' => $dados], 200);
        } catch (Exception $e) {
            return response('Erro:' . $e->getMessage(), 500);
        }
    }

    public function show($id)
    {
        return response(['dados' => Servico::findOrFail($id)]);
    }

    public function update(ServicoRequest $request, $id)
    {
        $dados = $request->all();

        try {
            $dados = Servico::findOrFail($id);
            $dados->update($dados);
            return response()->json(['msg' => 'Dados atualizados com sucesso', 'dados' => $dados], 200);
        } catch (Exception $e) {
            return response('Erro:' . $e->getMessage(), 500);
        }
    }

    public function destroy($id)
    {
        try {
            $dados = Servico::findOrFail($id);
            $dados->delete();
            return response()->json(['msg' => 'registro excluido com sucesso', 'dados' => $dados], 200);
        } catch (Exception $e) {
            return response('Erro:' . $e->getMessage(), 500);
        }
    }
}
