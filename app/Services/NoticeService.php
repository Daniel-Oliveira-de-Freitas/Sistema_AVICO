<?php

namespace App\Services;

use App\Http\Requests\Notice\NoticeRequest;
use App\Repositories\NoticeRepository;
use Exception;

class NoticeService
{
    /** @var NoticeRepository */
    protected $noticeRepository;

    public function __construct()
    {
        $this->noticeRepository = new NoticeRepository();
    }

    /** @return bool */
    public function createNotice(NoticeRequest $nr)
    {
        try {
            $this->noticeRepository->save($nr);
            return true;
        } catch (Exception $e) {
            report($e);
            return false;
        }
    }

    /** @return \Illuminate\Contracts\Pagination\LengthAwarePaginator|false */
    public function getAllNotices()
    {
        try {
            return $this->noticeRepository->getAll()->paginate(10);
        } catch (Exception $e) {
            report($e);
            return false;
        }
    }

    /** @return object|false */
    public function findNoticeById($id)
    {
        try {
            return $this->noticeRepository->getById((int) $id);
        } catch (Exception $e) {
            report($e);
            return false;
        }
    }

    /** @return bool */
    public function updateNotice($id, NoticeRequest $nr)
    {
        try {
            $this->noticeRepository->update((int) $id, $nr);
            return true;
        } catch (Exception $e) {
            report($e);
            return false;
        }
    }

    /** @return bool */
    public function deleteNotice($id)
    {
        try {
            $this->noticeRepository->destroy((int) $id);
            return true;
        } catch (Exception $e) {
            report($e);
            return false;
        }
    }
}
