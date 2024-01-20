<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\JobFakeNewsDetection;
use App\Services\JobFakeNewsDetectionService;
use Illuminate\Http\Request;

class FakeNewsDetectionController extends Controller
{
    protected JobFakeNewsDetectionService $jobFakeNewsDetectionService;

    public function __construct(){
        $this->jobFakeNewsDetectionService = new JobFakeNewsDetectionService();
    }

    public function index()
{
    $this->jobFakeNewsDetectionService = new JobFakeNewsDetectionService();
    $jobFakeNewsDetection = $this->jobFakeNewsDetectionService->getAll();

    return view('web.fake-news-detection.fnd_list', compact('jobFakeNewsDetection'));
}

    public function create()
    {
        return view('web.fake-news-detection.fnd');
    }

    public function store(Request $jobFndRequest)
    {
        $this->jobFakeNewsDetectionService = new JobFakeNewsDetectionService();
       if($this->jobFakeNewsDetectionService->create($jobFndRequest)){
           return redirect()->back()
           ->with('success', 'Job criado com sucesso!');
        }
        return redirect()->back()
        ->with('error', 'Houve um erro ao criar o job, por favor verifique os dados fornecidas!');
    }

    public function show(int $id)
    {
        $this->jobFakeNewsDetectionService = new JobFakeNewsDetectionService();
        $jobFakeNewsDetection = $this->jobFakeNewsDetectionService->findById($id);
        return view('web.noticias.visualizar-noticia')->with(compact('jobFakeNewsDetection'));
    }

    public function edit(int $id)
    {
        $this->jobFakeNewsDetectionService = new JobFakeNewsDetectionService();
        $jobFakeNewsDetection = $this->jobFakeNewsDetectionService->findById($id);
        return view('web.fake-news-detection.fnd_edit')->with(compact('jobFakeNewsDetection'));
    }

    public function update(int $id, $jobFndRequest)
    {
        $this->jobFakeNewsDetectionService = new JobFakeNewsDetectionService();
        $this->jobFakeNewsDetectionService->update($id, $jobFndRequest);
        return redirect()->route('web.fake-news-detection.fnd_list')->with('success', 'Job atualizado com sucesso!');
    }

    public function destroy(int $id)
    {
        $this->jobFakeNewsDetectionService = new JobFakeNewsDetectionService();
        $this->jobFakeNewsDetectionService->delete($id);
        return redirect()->route('web.fake-news-detection.fnd_list')->with('success', 'Job deletado com sucesso!');
    }

}
