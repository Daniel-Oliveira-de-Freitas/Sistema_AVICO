<?php

namespace App\Repositories;

use App\Models\Notice;
use App\Http\Requests\Notice\NoticeRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class NoticeRepository
{


    public function save(NoticeRequest $nr, $filePath)
    {
        $notice = new Notice();
        $notice->user_id = Auth::user()->id;
        $notice->titulo = $nr->title;
        $notice->conteudo = $nr->body;
        $notice->caminho_imagem = $filePath ? $filePath : 'images\assets\img\noticias\LOGO-AVICO.png';
        $notice->save();
    }

    /**
     * Retorna todos os usuario do banco de dados
     * @return array
     */
    public function getAll()
    {
        return DB::table('notices')->orderBy('id', 'DESC')->paginate(10);
    }

    /**
     * Retorna um usuario por id
     * @param int $id
     * @return object
     */
    public function getById($id)
    {
        return Notice::findorfail($id);
    }

    /**
     * Atualiza os dados de um usuario
     * @param int $id
     * @param array $user
     */
    public function update($id, NoticeRequest $nr, $filePath)
    {
        $notice = Notice::findorfail($id);
        $notice->update(['titulo' => $nr->title, 'conteudo' =>  $nr->body, 'caminho_imagem' => $filePath ? $filePath : $notice->caminho_imagem]);
    }

    /**
     * Deleta um usuario
     * @param int $id
     */
    public function destroy($id)
    {
        $notice = Notice::findorfail($id);
        return $notice->delete();
    }
}