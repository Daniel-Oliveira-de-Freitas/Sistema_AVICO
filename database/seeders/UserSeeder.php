<?php

namespace Database\Seeders;

use App\Enums\StatusType;
use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $email = 'admin@admin.com';
        $plainPassword = '123';
        $status = StatusType::Aprovado;

        $admin = User::updateOrCreate(
            ['email' => $email],
            [
                'password' => $plainPassword,
                'status' => $status,
                'active' => true,
            ],
        );
        $admin->assignRole('admin');
    }
}
