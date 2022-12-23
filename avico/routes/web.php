<?php

use App\Http\Controllers\AssocieController;
use App\Mail\FaleConoscoEmail;
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
    return view('static_views.perguntas');
});

Route::get('/doacoes', function () {
    return view('static_views.doacoes');
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

Route::post('/fale_conosco/mail', function (Request $request) {
    Mail::to('avicobrasil@gmail.com')->send(new FaleConoscoEmail($request));
    return view('static_views.fale_conosco');
});

Route::get('/enderecos', function () {
    return view('static_views.enderecos_uteis');
});

Route::get('/juridico', function () {
    return view('static_views.juridico');
});

Route::get('/noticias', function () {
    return view('static_views.noticias');
});

Route::get('/noticias', function () {
    return view('static_views.noticias');
});


Route::get('/inscricao', [AssocieController::class, 'create'])->name('inscricao.avico');

Route::post('/inscricao/store', [AssocieController::class, 'store'])->name('inscricao.store');

//Rotas das Noticias

Route::get('/covid-longa-e-tema-do-decimo-informe-da-rede-trabalhadores-covid-19-do-cesteh-fiocruz', function () {
    return view('static_views.noticias.noticia_ler');
});

Route::get('/mesmo-com-o-fim-da-situacao-de-emergencia-sanitaria-parte-da-populacao-ainda-sofre-com-sequelas-da-covid-19', function () {
    return view('static_views.noticias.noticia_ler2');
});

Route::get('/audiencia-debate-a-situacao-das-sequelas-das-vitimas-da-covid-no-rio-grande-do-sul', function () {
    return view('static_views.noticias.noticia_ler3');
});

Route::get('/estamos-ha-quase-tres-anos-com-a-covid-19-no-brasil-e-ainda-nada-foi-feito-critica-presidenta-da-avico-no-pleno-do-cns-sobre-familiares-e-vitimas-da-doenca', function () {
    return view('static_views.noticias.noticia_ler4');
});

Route::get('/audiencias-publicas-debaterao-a-situacao-das-sequelas-das-vitimas-da-covid-no-estado', function () {
    return view('static_views.noticias.noticia_ler5');
});

Route::get('/assembleia-legislativa-instala-frente-parlamentar-em-defesa-das-vitimas-da-covid-19', function () {
    return view('static_views.noticias.noticia_ler6');
});

Route::get('/avico-brasil-completa-1-ano-com-pedido-de-assistencia-litisconsorcial-em-acao-do-mpf-contra-uniao-e-queixa-crime-subsidiaria-contra-o-presidente-da-republica', function () {
    return view('static_views.noticias.noticia_ler7');
});

Route::get('/nota-de-repudio-ao-decreto-no-56-403-de-26-de-fevereiro-de-2022', function () {
    return view('static_views.noticias.noticia_ler8');
});

Route::get('/bancada-petista-encaminhara-criacao-de-frente-parlamentar-em-defesa-das-vitimas-de-covid-19', function () {
    return view('static_views.noticias.noticia_ler9');
});

Route::get('/manifestacao-publica-sobre-a-gravidade-da-reducao-da-quarentena-da-covid-19', function () {
    return view('static_views.noticias.noticia_ler10');
});

Route::get('/associacao-reune-parentes-e-pessoas-que-tiveram-a-doenca-queixa-crime-afirma-que-presidente-cometeu-nove-crimes-na-conducao-do-enfrentamento-a-pandemia-e-cita-inercia-da-pgr', function () {
    return view('static_views.noticias.noticia_ler11');
});

Route::get('/antropologo-jean-segata-e-indicado-ao-premio-pesquisador-gaucho-2022-por-pesquisas-sobre-os-impactos-sociais-da-covid-19', function () {
    return view('static_views.noticias.noticia_ler12');
});

Route::get('/juri-simbolico-do-tribunal-permanente-dos-povos-condena-bolsonaro-por-crimes-contra-a-humanidade-durante-a-pandemia', function () {
    return view('static_views.noticias.noticia_ler13');
});
