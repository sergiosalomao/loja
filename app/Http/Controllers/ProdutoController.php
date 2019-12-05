<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Produto;
use App\Http\Requests\FabricanteRequest;
use App\Http\Requests\ProdutoRequest;
use App\Imagem;
use Exception;


class ProdutoController extends Controller
{

    public function index(Request $request, Produto $produto)
    {
        
        $dados = $produto->newQuery();
        if ($request->filled('descricao')) {
            $dados->where('descricao', 'like', '%' . $request->descricao . '%');
        }

        $dados = $dados->with(['imagem'])->get();
        
        return response()->json($dados, 200);
        
    }


    public function store(ProdutoRequest $request)
    {
        $dados = $request->all();
        
        try {
            $produto = Produto::create($dados);
            $imagem = new Imagem($request->all());
            $produto->imagem()->save($imagem);

            return response()->json(['msg' => 'Dados salvos com sucesso', 'dados' => $dados], 200);
        } catch (Exception $e) {
            return response('Erro:' . $e->getMessage(), 500);
        }
    }

    public function show($id)
    {
        return response(['dados' => Produto::findOrFail($id)]);
    }

    public function update(ProdutoRequest $request, $id)
    {
        $dados = $request->all();

        try {
            $dados = Produto::findOrFail($id);
            $dados->update($dados);
            return response()->json(['msg' => 'Dados atualizados com sucesso', 'dados' => $dados], 200);
        } catch (Exception $e) {
            return response('Erro:' . $e->getMessage(), 500);
        }
    }

    public function destroy($id)
    {
        try {
            $dados = Produto::findOrFail($id);
            $dados->delete();
            return response()->json(['msg' => 'registro excluido com sucesso', 'dados' => $dados], 200);
        } catch (Exception $e) {
            return response('Erro:' . $e->getMessage(), 500);
        }
    }
}
