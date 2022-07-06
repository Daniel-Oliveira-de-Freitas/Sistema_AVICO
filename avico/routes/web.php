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

Route::get('/parceiros', function () {
    return view('static_views.parceiros');
});

Route::get('/enderecos', function () {
    return view('static_views.enderecos');
});

Route::get('/listar', [ListagemController::class, 'create']);

Route::get('/inscricao', [AssocieController::class, 'create'])->name('inscricao.avico');

Route::post('/inscricao/store',[AssocieController::class, 'store'])->name('inscricao.store');