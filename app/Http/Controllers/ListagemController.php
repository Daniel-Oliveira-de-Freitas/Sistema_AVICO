<?php

namespace App\Http\Controllers;

use App\Enums\StatusTypes;
use App\Models\User;
use App\Notifications\IndeferUserNotification;
use App\Notifications\WelcomeUserNotification;
use App\Services\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use ZipArchive;

class ListagemController extends Controller
{

    private UserService $userService;

    /**
     * @param UserService $userService
     */
    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function create()
    {
        $inscricoes = $this->userService->getAllUsersAwaitingApproval()->paginate(10);
        return view("web.associados.listar-associados")->with(compact('inscricoes'));
    }

    public function remove(Request $request, $id)
    {
        $user = $this->userService->findUserById($id);
        $this->userService->updateUser($id, ['status' => StatusTypes::Indeferido->value, 'active' => false]);
        $user->notify(new IndeferUserNotification($request->motivo));
        return redirect()->back()->with('success', 'Usuário indeferido no sistema');
    }

    public function aprove($id)
    {
        $user = $this->userService->findUserById($id);
        $this->userService->updateUser($id, ['status' => StatusTypes::Aprovado->value, 'active' => true]);
        $user->sendWelcomeNotification();
        return redirect()->back()->with('success', 'Usuário aprovado no sistema');
    }

    public function downloadFiles($id)
    {
        $user = $this->userService->findUserById($id);
        $zip = new ZipArchive;
        $filename = $user->person->cpf . '.zip';
        if ($zip->open(public_path($filename), ZipArchive::CREATE) === TRUE) {
            $files = File::files(storage_path('app\public\files\\' . $user->person->cpf));

            foreach ($files as $key => $value) {
                $relativeName = basename($value);
                $zip->addFile($value, $relativeName);
            }
            $zip->close();
        }
        return response()->download($filename)->deleteFileAfterSend(true);
    }
}
