<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Fabricante;
use App\Http\Requests\FabricanteRequest;
use Exception;


class FabricanteController extends Controller
{

    public function index(Request $request, Fabricante $fabricante)
    {
        
        $dados = $fabricante->newQuery();
        if ($request->filled('nome')) {
            $dados->where('nome', 'like', '%' . $request->nome . '%');
        }

        $dados = $dados->get();
        
        return response()->json($dados, 200);
        
    }


    public function store(FabricanteRequest $request)
    {
        $dados = $request->all();
        
        try {
            $fabricante = Fabricante::create($dados);
            $fabricante->save($dados);
            return response()->json(['msg' => 'Dados salvos com sucesso', 'dados' => $dados], 200);
        } catch (Exception $e) {
            return response('Erro:' . $e->getMessage(), 500);
        }
    }

    public function show($id)
    {
        return response(['dados' => Fabricante::findOrFail($id)]);
    }

    public function update(FabricanteRequest $request, $id)
    {
        $dados = $request->all();

        try {
            $dados = Fabricante::findOrFail($id);
            $dados->update($dados);
            return response()->json(['msg' => 'Dados atualizados com sucesso', 'dados' => $dados], 200);
        } catch (Exception $e) {
            return response('Erro:' . $e->getMessage(), 500);
        }
    }

    public function destroy($id)
    {
        try {
            $dados = Fabricante::findOrFail($id);
            $dados->delete();
            return response()->json(['msg' => 'registro excluido com sucesso', 'dados' => $dados], 200);
        } catch (Exception $e) {
            return response('Erro:' . $e->getMessage(), 500);
        }
    }
}
