<?php

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

Route::get('/inscricao', function () {
    return view('static_views.associe');
});

Route::post('store','App\Http\Controllers\AssocieController@store');