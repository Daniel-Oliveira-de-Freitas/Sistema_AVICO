<?php

namespace App\Http\Controllers;

use App\Busines\PersonBusines;
use App\Http\Requests\StoreRegistrationFormRequest;
use Exception;
use Illuminate\Http\Request;

class AssocieController extends Controller
{
    public function create()
    {
        return view('static_views.associados.associe');
    }

    private PersonBusines $business;

    public function store(Request $request, $filesNameArray, $filesPath)
    {
        $this->business = new PersonBusines();
        $cadastro = $this->business->inserir($request, $filesNameArray, $filesPath);
        if ($cadastro) {
            return redirect()->route('home.avico')
                ->with('success', 'messages.success_registration');
        } else {
            session()->now('fail', 'messages.fail_registration');
            session()->reflash();
        }
    }
}
