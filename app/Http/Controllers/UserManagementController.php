<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Services\UserService;

class UserManagementController extends Controller
{
    private UserService $userService;

    //TODO verificar nova forma para injetar as services
    public function __construct(UserService $userService)
    {
        $this->userService = new UserService();
    }

    public function index()
    {
        $users = $this->userService->getAllUsers();
        return view("web.user-management.list-users")->with(compact('users'));
    }

    public function edit(int $id)
    {
        $user = $this->userService->findUserById($id);
        return view("web.user-management.edit-user")->with(compact('user'));
    }

    public function update(int $id, UserRequest $userRequest)
    {
        if (!$userRequest->has('active')) {
            $userRequest->merge(['active' => false]);
        }
        return redirect()->back()->with($this->userService->updateUser($id, $userRequest));
    }

    public function destroy(int $id)
    {
        return redirect()->back()->with($this->userService->destroy($id));
    }
}
