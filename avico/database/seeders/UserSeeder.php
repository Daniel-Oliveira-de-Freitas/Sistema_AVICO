<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

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
        $admin->password = Hash::make('123');
        $admin->status = 'aprovado';
        $admin->active= 'true';
        $admin->save();
        $admin->assignRole('admin');
    }
}
