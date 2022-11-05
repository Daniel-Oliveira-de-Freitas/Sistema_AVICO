<?php
namespace App\Repository;

use App\Models\Notice;
use App\Http\Requests\Notice\NoticeRequest;
use Illuminate\Support\Facades\Auth;

class NoticeRepository {

    
    public function save(NoticeRequest $nr){
        $notice = new Notice();
        $notice->user_id = Auth::user()->id;
        $notice->titulo = $nr->title;
        $notice->conteudo = $nr->body;
        $notice->caminho_imagem = $nr->userfile;
        $notice->save();
    }

    /**
     * Retorna todos os usuario do banco de dados
     * @return array
     */
    public function getAll(){
        return Notice::all();
    }

    /**
     * Retorna um usuario por id
     * @param int $id
     * @return object
     */
    public function getById($id){
        return Notice::findorfail($id);
    }

    /**
     * Atualiza os dados de um usuario
     * @param int $id
     * @param array $user
     */
    public function update($id, array $arr){
        $user = Notice::findorfail($id);
       return $user->update($arr);
    }

    /**
    * Deleta um usuario
    * @param int $id
    */
    public function destroy($id){
        $user = Notice::findorfail($id);
        return $user->delete();
    }
    
}