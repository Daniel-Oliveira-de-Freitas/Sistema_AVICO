<?php

namespace App\Http\Controllers;

use App\Services\UserService;
use Illuminate\Http\Request;

class AssocieController extends Controller
{
    public function create()
    {
        return view('associados.associe');
    }

    private UserService $userService;

    public function store(Request $request, $filesNameArray, $filesPath)
    {
        $this->userService = new UserService();
        $cadastro = $this->userService->create($request, $filesNameArray, $filesPath);
        if ($cadastro) {
            return redirect()->route('home.avico')
                ->with('success', 'messages.success_registration');
        } else {
            session()->now('fail', 'messages.fail_registration');
            session()->reflash();
        }
    }
}
