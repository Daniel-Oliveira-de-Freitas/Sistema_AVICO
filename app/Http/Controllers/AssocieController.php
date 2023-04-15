<?php

namespace App\Http\Controllers;

use App\Services\UserService;
use Illuminate\Http\Request;

class AssocieController extends Controller
{
    public function create()
    {
        return view('web.associados.associe');
    }

    public function store(Request $request, array $filesNameArray, array $filesPath)
    {
        $userService = new UserService();
        if ($userService->create($request, $filesNameArray, $filesPath)) {
            return redirect()->route('home.avico')
                ->with('success', 'Cadastro realizado com sucesso!')
                ->with('warning', 'Seus dados serão analisados e você será avisado(a) via email!');
        }

        return session()->now('error', 'Houve um erro ao realizar o seu cadastro!');
    }
}
