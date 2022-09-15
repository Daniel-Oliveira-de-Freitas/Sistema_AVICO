<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        Permission::create(['name' => 'visualizar']);
        Permission::create(['name' => 'cadastrar']);
        Permission::create(['name' => 'editar']);
        Permission::create(['name' => 'excluir']);
        
        $role = Role::create(['name' => 'admin']);
        $role->givePermissionTo(Permission::all());
    
        $role = Role::create(['name' => 'associado'])
        ->givePermissionTo(['visualizar', 'cadastrar']);
    
        $role = Role::create(['name' => 'voluntario']);
        $role->givePermissionTo(['visualizar', 'cadastrar']);
    }
}
