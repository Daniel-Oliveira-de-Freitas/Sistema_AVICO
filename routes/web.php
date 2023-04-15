<?php

use App\Http\Controllers\AssocieController;
use App\Http\Controllers\Notice\NoticeController;
use App\Mail\FaleConoscoEmail;
use App\Models\Notice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
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

Route::get('/', function () {
    return view('index');
})->name('home.avico');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';

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

Route::post('/fale_conosco/mail', function (Request $request) {
    $request->validate([
        'name' => ['required'],
        'email' => ['required', 'email'],
        'phone' => ['required'],
        'message' => ['required'],

    ], [
        '*.required' => 'Este campo é obrigatório!',
        'email.email' => 'É necessário informar um email válido!',
    ]);
    Mail::to('avicobrasil@gmail.com')->send(new FaleConoscoEmail($request));
    return redirect()->back()->with("success", "Sua menssagem foi enviada!");
});

Route::get('/enderecos', function () {
    return view('web.static_views.enderecos_uteis');
});

Route::get('/juridico', function () {
    return view('web.static_views.juridico');
});

Route::get('/inscricao', [AssocieController::class, 'create'])->name('inscricao.avico');
Route::post('/inscricao/store', [AssocieController::class, 'store'])->name('inscricao.store');

Route::get('/noticias', [NoticeController::class, 'getAllNotices'])->name('noticias.avico');
Route::get('/noticia/{id}', [NoticeController::class, 'findNoticeById'])->name('noticiaLer.avico');
