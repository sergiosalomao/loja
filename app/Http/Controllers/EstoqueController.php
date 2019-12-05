<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Lancamento;
use App\Produto;

class EstoqueController extends Controller
{
    public function show($produto_id, Lancamento $lancamentos)
    {
        $lancamentos = $lancamentos->newQuery();
        $dados = $lancamentos->where('produto_id', $produto_id)->get();

        //pega o valor do produto
        $produto = Produto::findOrFail($produto_id);
        $valorProduto = $produto->valor;

        $quantidade = 0;
        foreach ($dados as $dado) {
            if ($dado['tipo'] == 'Entrada') {
                $quantidade += $dado['quantidade'];
            } else
            if ($dado['tipo'] == 'Saida') {
                $quantidade -= $dado['quantidade'];
            }
        }

        $dados['valor_estocado'] = $quantidade * $valorProduto;
        $dados['total_itens'] = $dados->count();
        $dados['estoque'] = $quantidade;

        return response()->json($dados, 200);
    }
}
