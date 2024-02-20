<?php

namespace App\Repositories;

use App\Models\JobFakeNewsDetection;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\Facades\DB;

class JobFakeNewsDetectionRepository
{
    public function save($jobFndRequest): void
    {
        JobFakeNewsDetection::create([
            'link' => $jobFndRequest->link,
            'frequencia' => $jobFndRequest->frequencia,
            'emails' => $jobFndRequest->emails,
        ]);
    }

      /**
     * Retorna todos os conteudos do banco de dados
     * @return Builder
     */
    public function getAll(): Builder
    {
        return DB::table('job_fake_news_detection')->orderBy('id', 'DESC');
    }

    /**
     * Retorna um conteudo por id
     * @param int $id
     * @return object
     */
    public function getById(int $id): object
    {
        return JobFakeNewsDetection::findorfail($id);
    }

    /**
     * Atualiza os dados de um conteudo
     * @param int $id
     * @param $jobFakeNewsDetection
     */
    public function update(int $id, $jobFndRequest): void
    {
        $jobFakeNewsDetection = JobFakeNewsDetection::findorfail($id);
        $jobFakeNewsDetection->update([
            'link' => $jobFndRequest->link,
            'cron' => $jobFndRequest->cron,
            'emails' => $jobFndRequest->emails
        ]);
    }

    /**
     * Deleta um conteudo
     * @param int $id
     */
    public function destroy(int $id)
    {
        $jobFakeNewsDetection = JobFakeNewsDetection::findorfail($id);
        return $jobFakeNewsDetection->delete();
    }
}
