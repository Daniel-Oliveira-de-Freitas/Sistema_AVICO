<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AssocieController;
use App\Http\Controllers\ListagemController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/perguntas', function () {
    return view('static_views.perguntas');
});

Route::get('/estatuto', function () {
    return view('static_views.estatuto');
});

Route::get('/estrutura', function () {
    return view('static_views.estrutura_organizacional');
});

Route::get('/mobilizacao', function () {
    return view('static_views.mobilizacao_e_controle_social');
});

Route::get('/apoio', function () {
    return view('static_views.apoio_psicossocial');
});

Route::get('/nucleos', function () {
    return view('static_views.nucleos');
});

Route::get('/parceiros', function () {
    return view('static_views.parceiros');
});

Route::get('/sobre', function () {
    return view('static_views.sobre');
});

Route::get('/fale_conosco', function () {
    return view('static_views.fale_conosco');
});

Route::get('/enderecos', function () {
    return view('static_views.enderecos_uteis');
});

Route::get('/juridico', function () {
    return view('static_views.juridico');
});

Route::get('/listar', [ListagemController::class, 'create']);

Route::get('/inscricao', [AssocieController::class, 'create'])->name('inscricao.avico');

Route::post('/inscricao/store',[AssocieController::class, 'store'])->name('inscricao.store');
