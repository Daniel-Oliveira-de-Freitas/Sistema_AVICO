<?php

namespace App\Services;

use App\Http\Requests\ContentRequest;
use App\Repositories\ContentRepository;
use Exception;

class ContentService
{
    protected ContentRepository $contentRepository;

    public function __construct()
    {
        $this->contentRepository = new ContentRepository();
    }

    public function createContent(ContentRequest $nr)
    {
        try {
            $this->contentRepository->save($nr);
        } catch (Exception $e) {
            return false;
        }
    }

    /**
     * Retorna todos os conteudos do banco de dados
     */
    public function getAllContentss()
    {
        try {
            return $this->contentRepository->getAll()->paginate(10);
        } catch (Exception $e) {
            return false;
        }
    }

    /**
     * Retorna um conteudo por id
     * @param int $id
     * @return object|bool
     */
    public function findContentById(int $id): object|bool
    {
        try {
            return $this->contentRepository->getById($id);
        } catch (Exception $e) {
            return false;
        }
    }

    /*
     * Atualiza os dados de um conteudo
     * @param int $id
     * @param ContentRequest $nr
     */
    public function updateContent(int $id, ContentRequest $nr)
    {
        try {
            $this->contentRepository->update($id, $nr);
        } catch (Exception $e) {
            return false;
        }
    }

    /**
     * Deleta um conteudo
     * @param int $id
     */
    public function deleteContent($id)
    {
        try {
            $this->contentRepository->destroy($id);
            return true;
        } catch (Exception $e) {
            return false;
        }
    }
}
