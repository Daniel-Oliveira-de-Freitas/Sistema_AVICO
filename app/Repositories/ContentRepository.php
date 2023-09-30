<?php

namespace App\Repositories;

use App\Actions\SaveFilesAction;
use App\Http\Requests\ContentRequest;
use App\Models\Content;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ContentRepository
{

    public function save(ContentRequest $nr): void
    {
        Content::create([
            'user_id' => Auth::user()->id,
            'titulo' => $nr->title,
            'conteudo' => $nr->body,
            'caminho_imagem' => SaveFilesAction::contentFileSave($nr->userfile) ?: 'images\assets\img\noticias\LOGO-AVICO.png'
        ]);
    }

    /**
     * Retorna todos os conteudos do banco de dados
     * @return Builder
     */
    public function getAll(): Builder
    {
        return DB::table('contents')->orderBy('id', 'DESC');
    }

    /**
     * Retorna um conteudo por id
     * @param int $id
     * @return object
     */
    public function getById(int $id): object
    {
        return Content::findorfail($id);
    }

    /**
     * Atualiza os dados de um conteudo
     * @param int $id
     * @param ContentRequest $nr
     * @param string $filePath
     */
    public function update(int $id, ContentRequest $nr): void
    {
        $content = Content::findorfail($id);
        $content->update([
            'titulo' => $nr->title,
            'conteudo' => $nr->body,
            'caminho_imagem' => SaveFilesAction::contentFileSave($nr->userfile) ?: $content->caminho_imagem]);
    }

    /**
     * Deleta um conteudo
     * @param int $id
     */
    public function destroy(int $id)
    {
        $content = Content::findorfail($id);
        return $content->delete();
    }
}
