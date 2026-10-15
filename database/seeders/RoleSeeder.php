<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Hash;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // Crear roles
        $adminRole = Role::firstOrCreate(['name' => 'Administrador']);
        $clienteRole = Role::firstOrCreate(['name' => 'Cliente']);


        
        
        //crear usuario administrador
        $admin = User::firstOrCreate(
        ['email' => 'admin@tienda.com'], [
            'name' => 'Super Admin', 'password' => Hash::make('password123'), ]
        );
        $admin->assignRole($adminRole);

        //crear usuario cliente
        $cliente = User::firstOrCreate(
        ['email' => 'cliente@tienda.com'], [
            'name' => 'Cliente', 'password' => Hash::make('password123'), ]
        );
        $cliente->assignRole($clienteRole);



    }
}
