<?php

namespace App\Http\Controllers;

use App\Models\Registration;
use GuzzleHttp\Promise\Create;
use Illuminate\Http\Request;

use function GuzzleHttp\Promise\all;

class ListagemController extends Controller
{
    //teste
    public function Create(){
        $inscricoes = Registration::all();
        return view("static_views.associados.list")->with(compact('inscricoes'));
    }
}
