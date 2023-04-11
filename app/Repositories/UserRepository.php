<?php

namespace App\Repositories;

use App\Enums\UserTypes;
use App\Models\User;
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
     * @return array
     */
    public function getAll()
    {
        return User::all();
    }

    /**
     * Retorna um usuario por id
     * @param int $id
     * @return object
     */
    public function getById($id)
    {
        return User::findorfail($id);
    }

    /**
     * Atualiza os dados de um usuario
     * @param int $id
     * @param array $user
     */
    public function update($id, array $arr)
    {
        $user = User::findorfail($id);
        return $user->update($arr);
    }

    /**
     * Deleta um usuario
     * @param int $id
     */
    public function destroy($id)
    {
        $user = User::findorfail($id);
        return $user->delete();
    }
}
