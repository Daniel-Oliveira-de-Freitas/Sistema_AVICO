<?php

namespace App\Services;

use App\Http\Requests\Notice\NoticeRequest;
use App\Repositories\NoticeRepository;
use Exception;

class NoticeService
{
    protected NoticeRepository $noticeRepository;

    public function __construct()
    {
        $this->noticeRepository = new NoticeRepository();
    }

    public function createNotice(NoticeRequest $nr)
    {
        // return $this->noticeRepository->save($nr);
    }


    /**
     * Retorna todos os usuario do banco de dados
     * @return array
     */
    public function getAllNotices()
    {
        return $this->noticeRepository->getAll();
    }

    /**
     * Retorna um usuario por id
     * @param int $id
     * @return object
     */
    public function findNoticeById($id)
    {
        try {
            return $this->noticeRepository->getById($id);
        } catch (Exception $e) {
            return false;
        }
    }

    /**
     * Atualiza os dados de um usuario
     * @param int $id
     * @param array $user
     */
    public function updateNotice($id, NoticeRequest $nr, $filePath)
    {
        try {
            return $this->noticeRepository->update($id, $nr, $filePath);
        } catch (Exception $e) {
            return false;
        }
    }


    /**
     * Deleta um usuario
     * @param int $id
     */
    public function deleteNotice($id)
    {
        try {
            $this->noticeRepository->destroy($id);
            return true;
        } catch (Exception $e) {
            return false;
        }
    }
}
