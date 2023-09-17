<?php

namespace App\Services;

use App\Enums\Authority;
use Exception;
use App\Enums\StatusType;
use App\Enums\UserType;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\DB;
use App\Repositories\FileRepository;
use App\Repositories\UserRepository;
use Spatie\Permission\Contracts\Role;
use App\Repositories\AdressRepository;
use App\Repositories\PersonRepository;
use App\Repositories\ReasonRepository;
use App\Repositories\FamilyVictimRepository;
use Illuminate\Pagination\LengthAwarePaginator;

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
     * @return LengthAwarePaginator
     */
    public function getAllUsers(): LengthAwarePaginator
    {
        return $this->userRepository->getAll()->paginate(10);
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
     * @return ResponseFactory
     */
    public function updateUser(int $id, UserRequest $userRequest)
    {
        try {
            DB::beginTransaction();
            $user = $this->findUserById($id);
            $roles = collect($userRequest->input('funcao'))->map(function ($type) {
                return Authority::from($type)->value;
            });
            $user->syncRoles($roles);

            $this->userRepository->update($id, $userRequest->all());
            DB::commit();
            return response(["success" => "O usuário com identificador {$id} foi atualizado no sistema"], 200)
                ->original;
        } catch (Exception $e) {
            DB::rollBack();
            return response(["error" => "Não foi possivel atualizar o usuário com identificador {$id}"], 200)->original;
        }
    }


    /**
     * Atualiza o cadastro de um usuário que está aguardando aprovação e manda um email
     * @param int $id
     * @param array $arr
     */
    public function updateUserRegister(int $id, StatusType $statusType, String $motivo = null)
    {
        try {
            DB::beginTransaction();
            $user = $this->findUserById($id);
            if ($statusType === StatusType::Indeferido) {
                $this->userRepository->update($id, ['status' => StatusType::Indeferido, 'active' => false]);
                $user->sendRejectedUserRegisterNotification($motivo);
            } else {
                $this->userRepository->update($id, ['status' => StatusType::Aprovado, 'active' => true]);
                $user->sendWelcomeNotification();
            }
            DB::commit();
            return response(["success" => "O usuário foi {$statusType->value} com sucesso no sistema"], 200)->original;
        } catch (Exception $e) {
            DB::rollBack();
            return response(["error" => "Não foi possivel {$statusType->value} o usuário"], 500)->original;
        }
    }


    public function destroy(int $id)
    {
        try {
            DB::beginTransaction();
            $this->userRepository->destroy($id);
            DB::commit();
            return response(["success" => "O usuário com identificador {$id} foi removido com sucesso no sistema"], 200)
                ->original;
        } catch (Exception $e) {
            DB::rollBack();
            return response(["error" => "Não foi possivel remover o usuário com identificador {$id}"], 500)->original;
        }
    }
}
