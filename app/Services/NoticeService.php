<?php

namespace App\Services;

use App\Http\Requests\NoticeRequest;
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
        try {
            $this->noticeRepository->save($nr);
        } catch (Exception $e) {
            return false;
        }
    }

    /**
     * Retorna todos os usuario do banco de dados
     */
    public function getAllNotices()
    {
        try {
            return $this->noticeRepository->getAll()->paginate(10);
        } catch (Exception $e) {
            return false;
        }
    }

    /**
     * Retorna um usuario por id
     * @param int $id
     * @return object|bool
     */
    public function findNoticeById(int $id): object|bool
    {
        try {
            return $this->noticeRepository->getById($id);
        } catch (Exception $e) {
            return false;
        }
    }

    /*
     * Atualiza os dados de um usuario
     * @param int $id
     * @param NoticeRequest $nr
     */
    public function updateNotice(int $id, NoticeRequest $nr)
    {
        try {
            $this->noticeRepository->update($id, $nr);
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
