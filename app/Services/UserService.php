<?php

namespace App\Services;

use App\Repositories\PersonRepository;
use App\Repositories\UserRepository;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Exception;

class UserService
{
    protected PersonRepository $personRepository;
    protected UserRepository $userRepository;


    public function __construct()
    {
        $this->personRepository = new PersonRepository();
        $this->userRepository = new UserRepository();
    }

    public function create(Request $request, $fileNames, $filePaths)
    {
        return $this->personRepository->save($request, $fileNames, $filePaths);
    }

    /**
     * Retorna todos os usuario do banco de dados
     * @return Collection
     */
    public function getAllUsers(): Collection
    {
        return $this->userRepository->getAll();
    }


    /**
     * Retorna todos os usuario que estão esperando aprovação do banco de dados
     * @return Builder
     */
    public function getAllUsersAwaitingApproval(): Builder
    {
        return $this->userRepository->getAllAwaitingApproval();
    }

    /**
     * Retorna um usuario por id
     * @param int $id
     * @return object|bool
     */
    public function findUserById($id)
    {
        try {
            return $this->userRepository->getById($id);
        } catch (Exception $e) {
            return false;
        }
    }

    /**
     * Atualiza os dados de um usuario
     * @param int $id
     * @param array $user
     */
    public function updateUser($id, $arr): ?bool
    {
        try {
            return $this->userRepository->update($id, $arr);
        } catch (Exception $e) {
            return false;
        }
    }

}
