<?php

namespace App\Repositories;

use App\Enums\StatusTypes;
use App\Enums\UserTypes;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserRepository
{

    public function save(Request $request)
    {
        $user = new User();
        $user->email =  $request->email;
        $user->password = Hash::make($request->password);
        $user->save();
        $roles = collect($request->input('tipo'))->map(function ($type) {
            return UserTypes::from($type)->value;
        });
        $user->assignRole($roles);

        return $user->id;
    }

    /**
     * Retorna todos os usuario do banco de dados
     * @return Collection
     */
    public function getAll(): Collection
    {
        return User::all();
    }

    /**
     * Retorna todos os usuario do banco de dados
     * @return Builder
     */
    public function getAllAwaitingApproval(): Builder
    {
        return User::where('status', StatusTypes::Aguardando_aprovacao->value);
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
     * @param array $arr
     * @return null
     */
    public function update(int $id, array $arr)
    {
        return User::findorfail($id)?->update($arr);
    }

}
