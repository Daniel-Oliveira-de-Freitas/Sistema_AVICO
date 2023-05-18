<?php

namespace App\Services;

use App\Repositories\AdressRepository;
use App\Repositories\FamilyVictimRepository;
use App\Repositories\FileRepository;
use App\Repositories\PersonRepository;
use App\Repositories\ReasonRepository;
use App\Repositories\UserRepository;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\DB;

class UserService
{
    private PersonRepository $personRepository;
    private UserRepository $userRepository;
    private FamilyVictimRepository $familyVictimRepository;
    private AdressRepository $adressRepository;
    private FileRepository $fileRepository;
    private ReasonRepository $reasonRepository;


    public function __construct()
    {
        $this->personRepository = new PersonRepository();
        $this->userRepository = new UserRepository();
        $this->fileRepository = new FileRepository();
        $this->adressRepository = new AdressRepository();
        $this->reasonRepository = new ReasonRepository();
        $this->familyVictimRepository = new FamilyVictimRepository();
    }

    public function create(Request $request): bool
    {
        try {
            DB::beginTransaction();
            $user = $this->userRepository->save($request);
            $person = $this->personRepository->save($request, $user->id);
            $this->reasonRepository->save($request, $person->id);
            $this->adressRepository->save($request, $person->id);
            $this->fileRepository->save($person, $request->files);
            if (in_array('Familiar de vítima da COVID-19', $request->condicoes)) {
                $this->familyVictimRepository->save($request, $person->id);
            }
            DB::commit();
            return true;
        } catch (Exception $e) {
            DB::rollBack();
            return false;
        }
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
     * @return LengthAwarePaginator
     */
    public function getAllUsersAwaitingApproval(): LengthAwarePaginator
    {
        return $this->userRepository->getAllAwaitingApproval()->paginate(10);
    }

    /**
     * Retorna um usuario por id
     * @param int $id
     * @return object|bool
     */
    public function findUserById(int $id): object|bool
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
     * @param array $arr
     * @return ?bool
     */
    public function updateUser(int $id, array $arr): ?bool
    {
        try {
            return $this->userRepository->update($id, $arr);
        } catch (Exception $e) {
            return false;
        }
    }

}
