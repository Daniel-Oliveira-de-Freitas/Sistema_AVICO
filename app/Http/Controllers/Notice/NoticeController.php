<?php

namespace App\Http\Controllers\Notice;

use App\Http\Controllers\Controller;
use App\Http\Requests\Notice\NoticeRequest;
use App\Repositories\NoticeRepository;
use App\Services\NoticeService;
use Illuminate\Http\Request;

class NoticeController extends Controller
{
    protected NoticeService $noticeService;

    public function create()
    {
        return view('web.noticias.criar-noticia');
    }

    public function store(NoticeRequest $nr)
    {
        $noticeRepository = new NoticeRepository();
        $noticeRepository->save($nr, $this->getImagePath($nr));
        return redirect()->back()
            ->with('success', 'Noticia criada com sucesso!');
    }

    public function getAllNotices()
    {
        $this->noticeService = new NoticeService();
        $noticias = $this->noticeService->getAllNotices();
        return view('web.static_views.noticias')->with(compact('noticias'));
    }

    public function findNoticeById($id)
    {
        $this->noticeService = new NoticeService();
        $noticia = $this->noticeService->findNoticeById($id);
        return view('web.noticias.visualizar-noticia')->with(compact('noticia'));
    }

    public function removeNotice($id)
    {
        $this->noticeService = new NoticeService();
        $this->noticeService->deleteNotice($id);
        return redirect()->route('noticias.avico');
    }

    public function findNoticeByIdUpdate($id)
    {
        $this->noticeService = new NoticeService();
        $noticia = $this->noticeService->findNoticeById($id);
        return view('web.noticias.editar-noticia')->with(compact('noticia'));
    }

    public function updateNotice($id, NoticeRequest $nr)
    {
        $noticeRepository = new NoticeService();
        $noticeRepository->updateNotice($id, $nr, $this->getImagePath($nr));
        return redirect()->route('noticias.avico');
    }

    public function getImagePath(Request $r)
    {
        if (!empty($r->hasfile('userfile'))) {
            $name = $r->userfile->getClientOriginalName();
            $r->userfile->move(public_path('images\assets\noticias\\'), $name);
            return 'images\assets\noticias\\' . $name;
        }

        return '';
    }
}
