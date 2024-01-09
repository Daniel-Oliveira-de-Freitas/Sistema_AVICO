<?php

namespace App\Services;

use App\Repositories\JobFakeNewsDetectionRepository;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class JobFakeNewsDetectionService
{
    protected JobFakeNewsDetectionRepository $jobFakeNewsDetectionRepository;

    public function __construct()
    {
        $this->jobFakeNewsDetectionRepository = new JobFakeNewsDetectionRepository();
    }

    public function create(Request $jobFndRequest)
    {
        try {
            DB::beginTransaction();
            $this->jobFakeNewsDetectionRepository->save($jobFndRequest);
            DB::commit();
            return true;
        } catch (Exception $e) {
            DB::rollBack();
            return false;
        }
    }

    /**
     * Retorna todos os conteudos do banco de dados
     */
    public function getAll()
    {
        try {
            return $this->jobFakeNewsDetectionRepository->getAll()->paginate(10);
        } catch (Exception $e) {
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
            DB::rollBack();
            return false;
        }
    }
}
