<?php

namespace App\Repositories;

use App\Actions\SaveFilesAction;
use App\Http\Requests\Notice\NoticeRequest;
use App\Models\Notice;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class NoticeRepository
{
    /** @return string|null */
    private function defaultImagePath()
    {
        // caminho(s) possíveis — ajuste para o que você tem em produção
        $candidates = [
            'images/assets/img/noticias/LOGO-AVICO.png',
            'images/assets/img/noticias/logo_avico.png',
            'images/assets/noticias/LOGO-AVICO.png', // fallback se pasta antiga existir
            'images/assets/noticias/logo_avico.png',
        ];

        foreach ($candidates as $path) {
            if (file_exists(public_path($path))) {
                return $path;
            }
        }

        return null;
    }

    public function save(NoticeRequest $nr)
    {
        // Pegar corretamente o arquivo enviado
        $file = $nr->file('userfile'); // UploadedFile|null
        $savedPath = SaveFilesAction::noticeFileSave($file);

        $path = $savedPath ?: $this->defaultImagePath();

        Notice::create([
            'user_id'       => Auth::id(),
            'titulo'        => $nr->input('title'),
            'conteudo'      => $nr->input('body'),
            'caminho_imagem'=> $path,
        ]);
    }

    /** @return Builder */
    public function getAll()
    {
        return DB::table('notices')->orderBy('id', 'DESC');
    }

    /** @return object */
    public function getById($id)
    {
        return Notice::findOrFail((int) $id);
    }

    public function update($id, NoticeRequest $nr)
    {
        $notice = Notice::findOrFail((int) $id);

        $file = $nr->file('userfile');
        $savedPath = SaveFilesAction::noticeFileSave($file);

        $notice->update([
            'titulo'        => $nr->input('title'),
            'conteudo'      => $nr->input('body'),
            // mantém a atual se não subiu nova
            'caminho_imagem'=> $savedPath ?: $notice->caminho_imagem,
        ]);
    }

    public function destroy($id)
    {
        $notice = Notice::findOrFail((int) $id);
        return $notice->delete();
    }
}
