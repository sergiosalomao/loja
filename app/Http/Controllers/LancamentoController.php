<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Lancamento;
use App\Http\Requests\LancamentoRequest;
use Exception;


class LancamentoController extends Controller
{

    public function index(Request $request, Lancamento $lancamentos)
    {
        
        $dados = $lancamentos->newQuery();
        if ($request->filled('tipo')) {
            $dados->where('tipo', 'like', '%' . $request->tipo . '%');
        }

        if ($request->filled('produto_id')) {
            $dados->where('produto_id', $request->poduto_id);
        }

        
        $dados = $dados->get();
        
        return response()->json($dados, 200);
        
    }


    public function store(LancamentoRequest $request)
    {
        $dados = $request->all();

        try {
            $lancamentos = Lancamento::create($dados);
            $lancamentos->save($dados);
            return response()->json(['msg' => 'Dados salvos com sucesso', 'dados' => $dados], 200);
        } catch (Exception $e) {
            return response('Erro:' . $e->getMessage(), 500);
        }
    }

    public function show($id)
    {
        return response(['dados' => Lancamento::findOrFail($id)]);
    }

    public function update(LancamentoRequest $request, $id)
    {
        $dados = $request->all();

        try {
            $dados = Lancamento::findOrFail($id);
            $dados->update($dados);
            return response()->json(['msg' => 'Dados atualizados com sucesso', 'dados' => $dados], 200);
        } catch (Exception $e) {
            return response('Erro:' . $e->getMessage(), 500);
        }
    }

    public function destroy($id)
    {
        try {
            $dados = Lancamento::findOrFail($id);
            $dados->delete();
            return response()->json(['msg' => 'registro excluido com sucesso', 'dados' => $dados], 200);
        } catch (Exception $e) {
            return response('Erro:' . $e->getMessage(), 500);
        }
    }
}
