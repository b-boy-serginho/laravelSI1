<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Rol;
use App\Models\UsuarioRol;

class UsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Creación de Usuarios
        // $users = [
        //     [
            
        //         'name' => 'David',
        //         'email' => 'admin@example.com',
        //         'estado' => 'activo',
        //         'fechaCreacion' => now(),
        //         'rolUsuario' => 1,
        //         'password' => bcrypt('12345678'),

        //         // 'ci' => '111',
        //         // 'sexo' => 'M',
        //         // 'direccion' => 'Av. Santos Doumont',
        //         // 'telefono' => '123',
        //     ],
        //     // [
        //     //     'name' => 'Empleado1',
        //     //     'email' => 'empleado1@example.com',
        //     //     'estado' => 'activo',
        //     //     'fechaCreacion' => now(),
        //     //     'password' => bcrypt('12345678'),
        //     // ],

        //     // [
        //     //     'name' => 'Empleado2',
        //     //     'email' => 'empleado2@example.com',
        //     //     'estado' => 'activo',
        //     //     'fechaCreacion' => now(),
        //     //     'password' => bcrypt('12345678'),

        //     //     // 'ci' => '222',
        //     //     // 'sexo' => 'M',
        //     //     // 'direccion' => 'Transito',
        //     //     // 'telefono' => '456',
        //     // ],       

        // ];


        // foreach ($users as $userData) {
        //     User::create($userData);
        // }
    
        // Rol::create([         
        //     'descripcion' => 'Administrador'          
        // ]); 
        // Rol::create([         
        //     'descripcion' => 'Empleado'          
        // ]);
        // Rol::create([         
        //     'descripcion' => 'Cliente'          
        // ]);


        // Rol::create([         
        //     'rolUsuario' => 'Proveedor'          
        // ]);
        // UsuarioRol::create([         
        //     'usuario_id' => '1',    
        //     'rol_id' => '1'            
        // ]);
        // UsuarioRol::create([         
        //     'usuario_id' => '2',    
        //     'rol_id' => '2'            
        // ]);
        // UsuarioRol::create([         
        //     'usuario_id' => '3',    
        //     'rol_id' => '2'          
        // ]);
        // UsuarioRol::create([         
        //     'usuario_id' => '4',    
        //     'rol_id' => '3'          
        // ]);   
        
        


    }

    
   
}
