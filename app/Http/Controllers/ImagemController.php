<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Produto;
use App\Imagem;

class ImagemController extends Controller
{
    
    public function index()
    {
        //
    }

    public function store(Request $request)
    {
        $produto = Produto::findOrFail($request->produto_id);
        $imagem = new Imagem($request->all());
        $produto->imagem()->save($imagem);
        
    }

    
    public function show($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
