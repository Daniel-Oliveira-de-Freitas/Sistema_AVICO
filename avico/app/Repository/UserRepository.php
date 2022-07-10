<?php
namespace App\Repository;

use App\Http\Requests\StoreRegistrationFormRequest;;
use App\Models\User;

class UserRepository{

    public function save(StoreRegistrationFormRequest $request){
        $user = new User();
        $user->email =  $request->email;
        $user->password =  $request->password;

        $user->save();
    
        return $user->id;
    }
}