<?php

namespace App\Http\Controllers\Register;

use App\Enums\StatusType;
use App\Http\Controllers\Controller;
use App\Models\User;
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

        session()->now('error', 'Houve um erro ao realizar o seu cadastro, por favor verifique os dados fornecidas!');
    }

    public function rejectUserRegister(Request $request, int $id)
    {
        return redirect()->back()->with($this->userService->updateUserRegister($id, StatusType::Indeferido, $request));
    }

    public function approveUserRegister(int $id)
    {
        return redirect()->back()->with($this->userService->updateUserRegister($id, StatusType::Aprovado));
    }

    public function downloadFiles(User $user)
    {
        $zip = new ZipArchive;
        $filename = 'Documentos de ' . $user->person->nome_completo . '.zip';
        if ($zip->open(public_path($filename), ZipArchive::CREATE) === true) {
            //$files = File::files(storage_path('app\public\\' . $user->person->file->caminho_arquivos));
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
