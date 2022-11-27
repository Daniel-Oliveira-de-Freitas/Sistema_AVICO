<?php

namespace App\Http\Controllers;

use App\Busines\PersonBusines;
use App\Http\Requests\StoreRegistrationFormRequest;
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
        // $filesNameArray = [];
        // if ($request->hasfile('filenames')) {
        //     $count = 0;
        //     foreach ($request->file('filenames') as $file) {
        //         $count++;
        //         $name = $file->getClientOriginalName();
        //         $file->move(public_path('files/' . $request->cpf), $name);
        //         $filesPath = 'files/' . $request->cpf;
        //         $filesNameArray[] = $name;
        //     }
        // }
        $cadastro = $this->business->inserir($request, $filesNameArray, $filesPath);
        if ($cadastro) {
            return redirect()->route('inscricao.avico')
                ->with('success', 'messages.success_registration');
        } else {
            return redirect()->route('inscricao.avico')
                ->with('fail', 'messages.fail_registration');
        }
    }
}
