<?php

namespace App\Http\Controllers\Notice;

use App\Http\Controllers\Controller;
use App\Http\Requests\NoticeRequest;
use App\Services\NoticeService;

class NoticeController extends Controller
{
    protected NoticeService $noticeService;

    public function index()
    {
        $this->noticeService = new NoticeService();
        $noticias = $this->noticeService->getAllNotices();
        return view('web.noticias.listar-noticias')->with(compact('noticias'));
    }

    public function create()
    {
        return view('web.noticias.criar-noticia');
    }

    public function store(NoticeRequest $nr)
    {
        $this->noticeService = new NoticeService();
        $this->noticeService->createNotice($nr);
        return redirect()->back()
            ->with('success', 'Noticia criada com sucesso!');
    }

    public function show(int $id)
    {
        $this->noticeService = new NoticeService();
        $noticia = $this->noticeService->findNoticeById($id);
        return view('web.noticias.visualizar-noticia')->with(compact('noticia'));
    }

    public function edit(int $id)
    {
        $this->noticeService = new NoticeService();
        $noticia = $this->noticeService->findNoticeById($id);
        return view('web.noticias.editar-noticia')->with(compact('noticia'));
    }

    public function update(int $id, NoticeRequest $nr)
    {
        $this->noticeService = new NoticeService();
        $this->noticeService->updateNotice($id, $nr);
        return redirect()->route('listar.noticias');
    }

    public function destroy(int $id)
    {
        $this->noticeService = new NoticeService();
        $this->noticeService->deleteNotice($id);
        return redirect()->route('listar.noticias');
    }
}
