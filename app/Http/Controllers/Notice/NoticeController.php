<?php

namespace App\Http\Controllers\Notice;

use App\Http\Controllers\Controller;
use App\Http\Requests\Notice\NoticeRequest;
use App\Services\NoticeService;

class NoticeController extends Controller
{
    /** @var NoticeService */
    protected $noticeService;

    public function __construct()
    {
        $this->noticeService = new NoticeService();
    }

    public function index()
    {
        $noticias = $this->noticeService->getAllNotices();
        return view('web.noticias.listar-noticias')->with(compact('noticias'));
    }

    public function create()
    {
        return view('web.noticias.criar-noticia');
    }

    public function store(NoticeRequest $nr)
    {
        $ok = $this->noticeService->createNotice($nr);

        return redirect()->route('listar.noticias')
            ->with($ok ? 'success' : 'error', $ok ? 'Noticia criada com sucesso!' : 'Falha ao criar notícia.');
    }

    public function show($id)
    {
        $noticia = $this->noticeService->findNoticeById((int) $id);
        return view('web.noticias.visualizar-noticia')->with(compact('noticia'));
    }

    public function edit($id)
    {
        $noticia = $this->noticeService->findNoticeById((int) $id);
        return view('web.noticias.editar-noticia')->with(compact('noticia'));
    }

    public function update($id, NoticeRequest $nr)
    {
        $ok = $this->noticeService->updateNotice((int) $id, $nr);

        return redirect()->route('listar.noticias')
            ->with($ok ? 'success' : 'error', $ok ? 'Noticia atualizada com sucesso!' : 'Falha ao atualizar notícia.');
    }

    public function destroy($id)
    {
        $ok = $this->noticeService->deleteNotice((int) $id);

        return redirect()->route('listar.noticias')
            ->with($ok ? 'success' : 'error', $ok ? 'Noticia deletada com sucesso!' : 'Falha ao deletar notícia.');
    }
}
