<?php

namespace App\Http\Controllers;

use App\Enums\StatusTypes;
use App\Models\Person;
use App\Models\User;
use App\Notifications\IndeferUserNotification;
use App\Notifications\WelcomeUserNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use ZipArchive;

class ListagemController extends Controller
{
  public function create()
  {
    $inscricoes = User::where('status', StatusTypes::Aguardando_aprovacao->value)->paginate(10);
    return view("static_views.associados.list")->with(compact('inscricoes'));
  }

  public function remove(Request $request,$id)
  {
    $user = User::findorfail($id);
    $user->update(['status' => StatusTypes::Indeferido->value, 'active' => false]);
    $user->notify(new IndeferUserNotification($request->motivo));
    return redirect()->back()->with('success', '<div class="alert alert-dismissible alert-success">
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        <strong>Usuario indeferido no sisteam</strong>
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
