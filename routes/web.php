<?php

use App\Http\Controllers\ContactUsController;
use App\Http\Controllers\Notice\NoticeController;
use App\Http\Controllers\Register\RegisterFormController;
use Illuminate\Support\Facades\Route;

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
require __DIR__ . '/auth.php';

Route::get('/', function () {
    return view('index');
})->name('avico.home');

Route::get('/perguntas', function () {
    return view('web.static_views.perguntas');
});

Route::get('/doacoes', function () {
    return view('web.static_views.doacoes');
});

Route::get('/estatuto', function () {
    return view('web.static_views.estatuto');
});

Route::get('/estrutura', function () {
    return view('web.static_views.estrutura_organizacional');
});

Route::get('/mobilizacao', function () {
    return view('web.static_views.mobilizacao_e_controle_social');
});

Route::get('/apoio', function () {
    return view('web.static_views.apoio_psicossocial');
});

Route::get('/nucleos', function () {
    return view('web.static_views.nucleos');
});

Route::get('/parceiros', function () {
    return view('web.static_views.parceiros');
});

Route::get('/sobre', function () {
    return view('web.static_views.sobre');
});

Route::get('/fale_conosco', function () {
    return view('web.static_views.fale_conosco');
});

Route::get('/enderecos', function () {
    return view('web.static_views.enderecos_uteis');
});

Route::get('/juridico', function () {
    return view('web.static_views.juridico');
});

Route::post('/fale_conosco/mail', ContactUsController::class);

Route::get('/cadastro-avico', [RegisterFormController::class, 'create'])->name('cadastro');
Route::post('/cadastro-avico', [RegisterFormController::class, 'store'])->name('cadastro.store');

Route::get('/noticias', [NoticeController::class, 'index'])->name('listar.noticias');
Route::get('noticias/noticia/{id}', [NoticeController::class, 'show'])->name('visualizar.noticia');

