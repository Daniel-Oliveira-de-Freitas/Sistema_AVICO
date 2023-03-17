<?php

namespace App\Http\Controllers\Auth;

use App\Enums\UserTypes;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('static_views.teste');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        // $request->validate([
        //     'name' => ['required', 'string', 'max:255'],
        //     'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        //     'password' => ['required', 'confirmed', Rules\Password::defaults()],
        // ]);

        $user = User::create([
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'status' => 'aguardando_aprovacao'
        ])->assignRole($request->tipo);

        event(new Registered($user));

        return redirect(RouteServiceProvider::HOME);
    }

    public function giverUserAuths(){
        $user = User::all();
           
        foreach ($user as $u) {
        $u->assignRole(UserTypes::Voluntario->value);  
        }
    }
}
