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
    $users = [
        [
            'ci' => '111',
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'estado' => 'activo',
            'sexo' => 'M',
            'direccion' => 'Av. Santos Doumont',
            'telefono' => '123',
            'fechaCreacion' => now(),
            'password' => bcrypt('12345678'),
        ],
        [
            'ci' => '222',
            'name' => 'Empleado',
            'email' => 'empleado@example.com',
            'estado' => 'activo',
            'sexo' => 'M',
            'direccion' => 'Transito',
            'telefono' => '456',
            'fechaCreacion' => now(),
            'password' => bcrypt('12345678'),
        ],
        [
            'ci' => '333',
            'name' => 'Cliente',
            'email' => 'cliente@example.com',
            'estado' => 'activo',
            'sexo' => 'M',
            'direccion' => 'Zona Alto San Pedro',
            'telefono' => '789',
            'fechaCreacion' => now(),
            'password' => bcrypt('12345678'),
        ],
        [
            'ci' => '444',
            'name' => 'Proveedor',
            'email' => 'proveedor@example.com',
            'estado' => 'activo',
            'sexo' => 'M',
            'direccion' => 'Zona Urubo',
            'telefono' => '701',
            'fechaCreacion' => now(),
            'password' => bcrypt('12345678'),
        ],
    ];

    foreach ($users as $userData) {
        User::create($userData);
    }
    
        Rol::create([         
            'rolUsuario' => 'Administrador'          
        ]); 
        Rol::create([         
            'rolUsuario' => 'Empleado'          
        ]);
        Rol::create([         
            'rolUsuario' => 'Cliente'          
        ]);
        Rol::create([         
            'rolUsuario' => 'Proveedor'          
        ]);
        UsuarioRol::create([         
            'user_id' => '1',    
            'rol_id' => '1'            
        ]);
        UsuarioRol::create([         
            'user_id' => '2',    
            'rol_id' => '2'            
        ]);
        UsuarioRol::create([         
            'user_id' => '3',    
            'rol_id' => '3'          
        ]);
        UsuarioRol::create([         
            'user_id' => '4',    
            'rol_id' => '4'          
        ]);
    }
}
