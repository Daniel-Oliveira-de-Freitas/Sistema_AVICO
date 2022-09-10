<?php

namespace App\Http\Controllers;

use App\Models\Registration;
use App\Models\User;
use GuzzleHttp\Promise\Create;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use function GuzzleHttp\Promise\all;

class ListagemController extends Controller
{
    //teste
    public function Create(){
     
        $inscricoes = $this->getAllPedidosAssociados()->get();
        // dd($inscricoes);
        return view("static_views.associados.list")->with(compact('inscricoes'));
    }

    protected function getAllPedidosAssociados(){
        return DB::table('users')->join('persons', 'persons.user_id', '=', 'users.id')
        ->join('adresses','persons.id','=','adresses.person_id')
        ->join('model_has_roles','model_has_roles.model_id', '=', 'persons.id')
        ->join('roles','roles.id', '=','model_has_roles.role_id')
        ->where('users.status', '=', 'aguardando_aprovacao');
    }
}
