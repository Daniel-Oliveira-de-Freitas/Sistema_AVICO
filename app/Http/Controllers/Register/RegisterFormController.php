<?php

namespace App\Http\Controllers\Register;

use App\Enums\StatusType;
use App\Http\Controllers\Controller;
use App\Services\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use ZipArchive;

class RegisterFormController extends Controller
{

    private UserService $userService;

    public function __construct()
    {
        $this->userService = new UserService();
    }

    public function index()
    {
        $inscricoes = $this->userService->getAllUsersAwaitingApproval();
        return view("web.associados.listar-cadastros")->with(compact('inscricoes'));
    }

    public function create()
    {
        return view('web.associados.cadastro-avico');
    }

    public function store(Request $request)
    {
        if ($this->userService->create($request)) {
            return redirect()->route('avico.home')
                ->with('success', 'Cadastro realizado com sucesso!')
                ->with('warning', 'Seus dados serão analisados e você será avisado(a) via email!');
        }

        return session()->now('error', 'Houve um erro ao realizar o seu cadastro!');
    }

    public function remove(Request $request, int $id)
    {
        $user = $this->userService->findUserById($id);
        $this->userService->updateUser($id, ['status' => StatusType::Indeferido->value, 'active' => false]);
        $user->sendIndeferRegisterNotification($request->motivo);
        return redirect()->back()->with('success', 'Usuário indeferido no sistema');
    }

    public function aprove(int $id)
    {
        $user = $this->userService->findUserById($id);
        $this->userService->updateUser($id, ['status' => StatusType::Aprovado->value, 'active' => true]);
        $user->sendWelcomeNotification();
        return redirect()->back()->with('success', 'Usuário aprovado no sistema');
    }

    public function downloadFiles(int $id)
    {
        $user = $this->userService->findUserById($id);
        $zip = new ZipArchive;
        $filename = 'Documentos de ' . $user->person->nome_completo . '.zip';
        if ($zip->open(public_path($filename), ZipArchive::CREATE) === true) {
            $files = File::files(storage_path('app\public\files\\' . $user->person->cpf));

            foreach ($files as $file) {
                $relativeName = basename($file);
                $zip->addFile($file, $relativeName);
            }
            $zip->close();
        }
        return response()->download($filename)->deleteFileAfterSend();
    }
}
