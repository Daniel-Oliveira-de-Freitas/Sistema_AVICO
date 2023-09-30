<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\ContentRequest;
use App\Services\ContentService;

class ContentController extends Controller
{
    protected ContentService $contentService;

    public function __construct(){
        $this->contentService = new ContentService();
    }

    public function index()
    {
        $contents = $this->contentService->getAllContent();
        return view('web.registration.list-content')->with(compact('contents'));
    }

    public function create()
    {
        return view('web.registration.content-registration');
    }

    public function store(ContentRequest $nr)
    {
        $this->contentService = new ContentService();
        $this->contentService->createContent($nr);
        return redirect()->back()
            ->with('success', 'Conteudo criado com sucesso!');
    }

    public function show(int $id)
    {
        $this->contentService = new ContentService();
        $content = $this->contentService->findContentById($id);
        return view('web.registration.view-content')->with(compact('content'));
    }

    public function edit(int $id)
    {
        $this->contentService = new ContentService();
        $content = $this->contentService->findContentById($id);
        return view('web.noticias.editar-noticia')->with(compact('content'));
    }

    public function update(int $id, NoticeRequest $nr)
    {
        $this->contentService = new ContentService();
        $this->contentService->updateContent($id, $nr);
        return redirect()->route('list.content')->with('success', 'Conteudo atualizado com sucesso!');
    }

    public function destroy(int $id)
    {
        $this->contentService = new ContentService();
        $this->contentService->deleteContent($id);
        return redirect()->route('list.content')->with('success', 'Conteudo deletado com sucesso!');
    }
}
