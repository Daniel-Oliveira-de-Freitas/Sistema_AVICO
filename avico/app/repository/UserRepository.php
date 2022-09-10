<?php
namespace App\Repository;

use App\Http\Requests\StoreRegistrationFormRequest;;
use App\Models\User;
use Error;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserRepository{

    public function save(Request $request){
        $user = new User();
        $user->email =  $request->email;
        $user->password = Hash::make($request->password);
        $user->save();
        $user->assignRole($request->tipo);
        return $user->id;
    }
}