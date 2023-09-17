<?php

namespace App\Repositories;

use App\Enums\StatusType;
use App\Enums\UserType;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;
use App\Http\Requests\UserRequest;

class UserRepository
{

    public function save(Request $request)
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password
        ]);
        $roles = collect($request->input('tipo'))->map(function ($type) {
            return UserType::from($type)->value;
        });
        $user->assignRole($roles);
        
        return $user;
    }

    /**
     * Retorna todos os usuarios do banco de dados
     * @return Builder
     */
    public function getAll(): Builder
    {
        return User::with('roles')->where('status', StatusType::Aprovado);
    }

    /**
     * Retorna todos os usuario do banco de dados
     * @return Builder
     */
    public function getAllAwaitingApproval(): Builder
    {
        return User::where('status', StatusType::Aguardando_aprovacao->value);
    }

    /**
     * Retorna um usuario por id
     * @param int $id
     * @return object
     */
    public function getById(int $id): object
    {
        return User::findorfail($id);
    }

     /**
     * Atualiza os dados de um usuario
     * @param int $id
     * @param UserRequest|array $arr
     */
    public function update(int $id, UserRequest|array $arr)
    {
        return User::findorfail($id)->update($arr);
    }

    /**
     * Remove os dados de um usuario
     * @param int $id
     */
    public function destroy(int $id)
    {
        return User::destroy($id);
    }
}
