<?php

namespace App\Http\Controllers\Notice;

use App\Http\Controllers\Controller;
use App\Http\Requests\Notice\NoticeRequest;
use App\Repository\NoticeRepository;
use App\Service\NoticeService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class NoticeController extends Controller
{
    protected NoticeService $noticeService;

    public function create()
    {
        return view('static_views.noticias.criaNoticia');
    }

    public function store(NoticeRequest $nr)
    {
        $noticeRepository = new NoticeRepository();
        $noticeRepository->save($nr, $this->getImagePath($nr));
        return redirect()->back()
            ->with('success', 'messages.notices.success_notice_registration');
    }

    public function getAllNotices()
    {
        $this->noticeService = new NoticeService();
        $noticias = $this->noticeService->getAllNotices();
        return view('static_views.noticias')->with(compact('noticias'));
    }

    public function findNoticeById($id)
    {
        $this->noticeService = new NoticeService();
        $noticia = $this->noticeService->findNoticeById($id);
        return view('static_views.noticias.noticia_ler')->with(compact('noticia'));
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
        return view('static_views.noticias.editarNoticia')->with(compact('noticia'));
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
        return 'images\assets\img\noticias\LOGO-AVICO.png';
    }
}
