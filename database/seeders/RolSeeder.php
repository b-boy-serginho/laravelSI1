<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

//PARA EL PERMISO
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use App\Models\User;


class RolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $role1 = Role::create(['name' => 'Admin']);
        $role2 = Role::create(['name' => 'Empleado']);

         // Definir y asignar permisos a roles
        //  Permission::create(['name' => 'admin.access', 'guard_name' => 'web'])->assignRole($role1);
        //  Permission::create(['name' => 'empleado.access', 'guard_name' => 'web'])->assignRole($role2);
 
        Permission::create(['name' => 'configuracion'])->syncRoles([$role1]);

        // Permission::create(['name' => 'rol.inicio'])->syncRoles([$role1]);
        // Permission::create(['name' => 'rol.editar'])->syncRoles([$role1]);

        // Permission::create(['name' => 'horario.inicio'])->syncRoles([$role1, $role2]);
        // Permission::create(['name' => 'horario.editar'])->syncRoles([$role1, $role2]);


        User::create([         
            'name' => 'Serginho',
            'email' => 'admin@gmail.com',
            'estado' => 'activo',
            'fechaCreacion' => now(),
          
            'password' => bcrypt('12345678'),          
        ]) ->assignRole('Admin');

        User::create([         
            'name' => 'David',
            'email' => 'empleado@gmail.com',
            'estado' => 'activo',
            'fechaCreacion' => now(),
      
            'password' => bcrypt('12345678'),          
        ])->assignRole('Empleado');

        // User::create([         
        //     'name' => 'Eunice',
        //     'email' => 'eunice@gmail.com',
        //     'estado' => 'activo',
        //     'fechaCreacion' => now(),
        //     'rolUsuario' => 1,
        //     'password' => bcrypt('12345678'),          
        // ])->assignRole('Empleado');

        // User::create([         
        //     'name' => 'Keila',
        //     'email' => 'keila@gmail.com',
        //     'estado' => 'activo',
        //     'fechaCreacion' => now(),
        //     'rolUsuario' => 1,
        //     'password' => bcrypt('12345678'),          
        // ]);
    }
}
