<?php

namespace App\Http\Controllers\Notice;

use App\Http\Controllers\Controller;
use App\Http\Requests\Notice\NoticeRequest;
use App\Repository\NoticeRepository;
use App\Service\NoticeService;

class NoticeController extends Controller
{
    protected NoticeService $noticeService;
    
    public function create()
    {
        return view('static_views.noticias.criaNoticia');
    }

    function store(NoticeRequest $nr){
        $this->noticeRepository = new NoticeRepository();
        $this->noticeRepository->save($nr);
        return redirect()->back()
        ->with('success', 'messages.notices.success_notice_registration');
    } 

}