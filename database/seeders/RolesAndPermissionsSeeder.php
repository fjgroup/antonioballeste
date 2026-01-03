<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissionsSeeder extends Seeder
{
    public function run()
    {
        // Reiniciar cache de permisos
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // Crear permisos
        Permission::firstOrCreate(['name' => 'view_any_training']);
        Permission::firstOrCreate(['name' => 'create_training']);
        Permission::firstOrCreate(['name' => 'update_training']);
        Permission::firstOrCreate(['name' => 'delete_training']);

        // Crear permisos para Usuarios (User Resource)
        Permission::firstOrCreate(['name' => 'view_any_user']);
        Permission::firstOrCreate(['name' => 'create_user']);
        Permission::firstOrCreate(['name' => 'update_user']);
        Permission::firstOrCreate(['name' => 'delete_user']);

        // Crear Roles
        $roleEditor = Role::firstOrCreate(['name' => 'editor']);
        // Asignar permisos al editor: Solo Trainigns, NADA de Usuarios
        $roleEditor->syncPermissions(['view_any_training', 'create_training', 'update_training']);

        $roleAdmin = Role::firstOrCreate(['name' => 'admin']);
        $roleAdmin->syncPermissions(Permission::all());

        // Crear usuario admin por defecto si no existe
        $adminUser = \App\Models\User::firstOrCreate([
            'email' => 'admin@antonioballeste.com',
        ], [
            'name' => 'Admin User',
            'password' => bcrypt('password'), // Cambiar contraseña en producción
        ]);
        $adminUser->assignRole($roleAdmin);

        // Crear usuario editor por defecto si no existe
        $editorUser = \App\Models\User::firstOrCreate([
            'email' => 'editor@antonioballeste.com',
        ], [
            'name' => 'Editor User',
            'password' => bcrypt('password'), // Cambiar contraseña en producción
        ]);
        $editorUser->assignRole($roleEditor);
    }
}
