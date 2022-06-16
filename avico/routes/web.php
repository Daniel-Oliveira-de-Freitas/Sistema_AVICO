<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AssocieController;

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

Route::get('/perguntasFrequentes', function () {
    return view('static_views.perguntasFrequentes');
});

Route::get('/parceiros', function () {
    return view('static_views.parceiros');
});

Route::get('/enderecos', function () {
    return view('static_views.enderecos');
});

Route::get('/inscricao', [AssocieController::class, 'create']);

Route::get('/teste', function () {
    return view('static_views.associados.teste');
});

Route::post('store',[AssocieController::class, 'store'])->name('store.dados');