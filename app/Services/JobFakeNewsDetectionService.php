<?php

namespace App\Services;

use App\Repositories\JobFakeNewsDetectionRepository;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class JobFakeNewsDetectionService
{
    protected JobFakeNewsDetectionRepository $jobFakeNewsDetectionRepository;

    public function __construct()
    {
        $this->jobFakeNewsDetectionRepository = new JobFakeNewsDetectionRepository();
    }

    public function create(Request $jobFndRequest): bool
    {
        Log::info("Salvando Job Execution");
        try {
            DB::beginTransaction();
            $this->jobFakeNewsDetectionRepository->save($jobFndRequest);
            DB::commit();
            return true;
        } catch (Exception $e) {
            Log::error($e);
            DB::rollBack();
            return false;
        }
    }

    /**
     * Retorna todos os conteudos do banco de dados
     */
    public function getAll()
    {
        Log::info("Retornando todos os dados da tabela jobFakeNewsDetection");
        try {
            return $this->jobFakeNewsDetectionRepository->getAll()->paginate(10);
        } catch (Exception $e) {
            Log::error($e);
            return false;
        }
    }

    /**
     * Retorna um conteudo por id
     * @param int $id
     * @return object|bool
     */
    public function findById(int $id): object|bool
    {
        try {
            return $this->jobFakeNewsDetectionRepository->getById($id);
        } catch (Exception $e) {
            Log::error($e);
            return false;
        }
    }

    /**
     * Retorna um conteudo por id
     * @param int $id
     * @return object|bool
     */
    public function findByFrequencia(string $frequencia): object|bool
    {
        try {
            return $this->jobFakeNewsDetectionRepository->getByFrequencia($frequencia);
        } catch (Exception $e) {
            Log::error($e);
            return false;
        }
    }

    /*
     * Atualiza os dados de um conteudo
     * @param int $id
     * @param $jobFndRequest
     */
    public function update(int $id, $jobFndRequest)
    {
        try {
            DB::beginTransaction();
            $this->jobFakeNewsDetectionRepository->update($id, $jobFndRequest);
            DB::commit();
            return true;
        } catch (Exception $e) {
            Log::error($e);
            DB::rollBack();
            return false;
        }
    }

    /**
     * Deleta um conteudo
     * @param int $id
     */
    public function delete($id)
    {
        try {
            DB::beginTransaction();
            $this->jobFakeNewsDetectionRepository->destroy($id);
            DB::commit();
            return true;
        } catch (Exception $e) {
            Log::error($e);
            DB::rollBack();
            return false;
        }
    }

    public function retrieveFakeNewsNotice($url): array
    {
        $resposta = [];
        $pageurls = Http::post("https://mining-api.vercel.app/fakeNewsDetection/scraping", ['url' => $url])->json();
        if (isset($pageurls["error"])) {
            return $pageurls;
        }
        foreach ($pageurls as $pageUrl) {
            $pageText = Http::post("https://mining-api.vercel.app/fakeNewsDetection/crawling", ['url' => $pageUrl[0]])->json();
            info($pageText);
            if ($pageText) {
                $text = $pageText[0];
                info($text);
                $response = Http::post("https://chatbot-integration-nine.vercel.app/fakeNewsDetection/validate", ['text' => $text])
                    ->json();
                $resposta[] = ["link" => $pageUrl[0], "text" => $response];
            }
        }
        return $resposta;
    }
}
