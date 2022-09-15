<?php

namespace App\Http\Controllers;

use App\Enums\StatusTypes;
use App\Models\Person;
use App\Models\User;
use App\Notifications\WelcomeUserNotification;
use Illuminate\Support\Facades\File;
use ZipArchive;

class ListagemController extends Controller
{
  public function create()
  {
    $inscricoes = Person::whereHas('User', function ($q) {
      $q->where('status', StatusTypes::Aguardando_aprovacao->value);
    })->get();

    return view("static_views.associados.list")->with(compact('inscricoes'));
  }

  public function remove($id)
  {
    $user = User::findorfail($id);
    File::deleteDirectory(public_path($user->person->file->caminho_arquivos));
    $user->delete();

    return redirect()->back()->with('success', '<div class="alert alert-dismissible alert-success">
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        <strong>Usuario deletado</strong>
      </div>');
  }

  public function aprove($id)
  {
    $user = User::findorfail($id);
    $user->update(['status' => StatusTypes::Aprovado->value, 'active' => true]);
    $user->notify(new WelcomeUserNotification());
    return redirect()->back()->with('success', '<div class="alert alert-dismissible alert-success">
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        <strong>Usuario aprovado no sistema</strong>
      </div>');
  }

  public function downloadFiles($id)
  {
    $user = User::findorfail($id);
    $zip = new ZipArchive;
    $filename = $user->person->cpf . '.zip';
    if ($zip->open(public_path($filename), ZipArchive::CREATE) === TRUE) {
      $files = File::files(public_path($user->person->file->caminho_arquivos));

      foreach ($files as $key => $value) {
        $relativeName = basename($value);
        $zip->addFile($value, $relativeName);
      }
      $zip->close();
    }

    return response()->download($filename)->deleteFileAfterSend(true);
  }
}
