<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['middleware' => ['cors']], function () {
    //Route::apiResource('empresas', 'EmpresaController');
});
Route::apiResource('empresas', 'EmpresaController');
Route::apiResource('clientes', 'ClienteController');
Route::apiResource('servicos', 'ServicoController');
Route::apiResource('fabricantes', 'FabricanteController');
Route::apiResource('produtos', 'ProdutoController');
Route::apiResource('imagens', 'ImagemController');
Route::apiResource('lancamentos', 'LancamentoController');

Route::get('estoque/{produto_id}', 'EstoqueController@show');

Route::post('login', 'AuthController@login');
Route::post('register', 'AuthController@register');
