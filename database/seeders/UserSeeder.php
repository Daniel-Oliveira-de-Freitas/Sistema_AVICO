<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = new User();
        $admin->email =  'admin@admin.com';
        $admin->password = '123';
        $admin->status = 'aprovado';
        $admin->active = 'true';
        $admin->save();
        $admin->assignRole('admin');
    }
}
