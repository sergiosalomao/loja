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
Route::post('login', 'AuthController@login');
Route::post('register', 'AuthController@register');
