<?php

namespace App\Repositories;

use App\Actions\SaveFilesAction;
use App\Http\Requests\NoticeRequest;
use App\Models\Notice;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class NoticeRepository
{

    public function save(NoticeRequest $nr): void
    {
        Notice::create([
            'user_id' => Auth::user()->id,
            'titulo' => $nr->title,
            'conteudo' => $nr->body,
            'caminho_imagem' => SaveFilesAction::noticeFileSave($nr->userfile) ?: 'images\assets\img\noticias\LOGO-AVICO.png'
        ]);
    }

    /**
     * Retorna todos os usuario do banco de dados
     * @return Builder
     */
    public function getAll(): Builder
    {
        return DB::table('notices')->orderBy('id', 'DESC');
    }

    /**
     * Retorna um usuario por id
     * @param int $id
     * @return object
     */
    public function getById(int $id): object
    {
        return Notice::findorfail($id);
    }

    /**
     * Atualiza os dados de um usuario
     * @param int $id
     * @param NoticeRequest $nr
     * @param string $filePath
     */
    public function update(int $id, NoticeRequest $nr): void
    {
        $notice = Notice::findorfail($id);
        $notice->update([
            'titulo' => $nr->title,
            'conteudo' => $nr->body,
            'caminho_imagem' => SaveFilesAction::noticeFileSave($nr->userfile) ?: $notice->caminho_imagem]);
    }

    /**
     * Deleta um usuario
     * @param int $id
     */
    public function destroy(int $id)
    {
        $notice = Notice::findorfail($id);
        return $notice->delete();
    }
}
