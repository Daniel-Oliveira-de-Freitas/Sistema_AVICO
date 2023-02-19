<?php

namespace App\Services;

use App\Repositories\PersonRepository;
use App\Repositories\UserRepository;
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
     * @return array
     */
    public function getAllUsers()
    {
        return $this->userRepository->getAll();
    }

    /**
     * Retorna um usuario por id
     * @param int $id
     * @return object
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
    public function updateUser($id, $arr)
    {
        try {
            return $this->userRepository->update($id, $arr);
        } catch (Exception $e) {
            return false;
        }
    }


    /**
     * Deleta um usuario
     * @param int $id
     */
    public function deleteUser($id)
    {
        try {
            $this->userRepository->destroy($id);
            return true;
        } catch (Exception $e) {
            return false;
        }
    }
}
