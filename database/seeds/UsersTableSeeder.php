<?php

use App\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permission::truncate();
        Role::truncate();
        User::truncate();
        $adminRole = Role::create(['name' => 'Admin', 'display_name' => 'Administrador']);
        $writerRole = Role::create(['name' => 'Writer', 'display_name' => 'Tecnico']);  //Writer

        $viewPostsPermission = Permission::create([
            'name' => 'View posts',
            'display_name' => 'Ver ordenes'    
        ]);
        $createPostsPermission = Permission::create([
            'name' => 'Create posts',
            'display_name' => 'Crear ordenes'    
        ]);
        $updatePostsPermission = Permission::create([
            'name' => 'Update posts',
            'display_name' => 'Actualizar ordenes'    
        ]);
        $deletePostsPermission = Permission::create([
            'name' => 'Delete posts',
            'display_name' => 'Eliminar ordenes'    
        ]);
 
        $viewUsersPermission = Permission::create([
            'name' => 'View users',
            'display_name' => 'Ver usuarios'    
        ]);
        $createUsersPermission = Permission::create([
            'name' => 'Create users',
            'display_name' => 'Crear usuarios' 
        ]);
        $updateUsersPermission = Permission::create([
            'name' => 'Update users',
            'display_name' => 'Actualizar usuarios' 
        ]);
        $deleteUsersPermission = Permission::create([
            'name' => 'Delete users',
            'display_name' => 'Eliminar usuarios' 
        ]);
        
        $viewRolesPermission = Permission::create([
            'name' => 'View roles',
            'display_name' => 'Ver roles' 
        ]);
        $createRolesPermission = Permission::create([
            'name' => 'Create roles',
            'display_name' => 'Crear roles'
        ]);
        $updateRolesPermission = Permission::create([
            'name' => 'Update roles',
            'display_name' => 'Actualizar roles'
        ]);
        $deleteRolesPermission = Permission::create([
            'name' => 'Delete roles',
            'display_name' => 'Eliminar roles'
        ]);

        $viewPermissionsPermission = Permission::create([
            'name' => 'View permissions',
            'display_name' => 'Ver permisos' 
        ]);

        $updatePermissionsPermission = Permission::create([
            'name' => 'Update permissions',
            'display_name' => 'Actualizar permisos' 
        ]);

        $admin = new User;
        $admin->name = 'Administrador de Ecoref';
        $admin->email = 'administrador@ecorefchile.cl';
        $admin->password = '123123';
        $admin->url = '/img/users/test.png';
        $admin->save();

        $admin->assignRole($adminRole);

        $writer = new User;
        $writer->name = 'Tecnico a Prueba';
        $writer->email = 'tecnico@ecorefchile.cl';
        $writer->password = '123123';
        $writer->url = '/img/users/test.png';
        $writer->save();

        $writer->assignRole($writerRole);

        $writer = new User;
        $writer->name = 'Tecnico Iquique';
        $writer->email = 'iquique@ecorefchile.cl';
        $writer->password = '123123';
        $writer->url = '/img/users/test.png';
        $writer->save();

        $writer->assignRole($writerRole);

        $writer = new User;
        $writer->name = 'Tecnico Antofagasta';
        $writer->email = 'antofagasta@ecorefchile.cl';
        $writer->password = '123123';
        $writer->url = '/img/users/test.png';
        $writer->save();

        $writer->assignRole($writerRole);
    }
}
