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
        User::create([
            'name' => 'David',
            'estado' => 'activo',
            'fechaCreacion' => now(),
            'email' => 'd@gmail.com',
            'password' => bcrypt('12345678'), // Agrega aquí una contraseña
        ]);
        User::create([         
            'name' => 'Juan',
            'email' => 'j@gmail.com', 
            'estado' => 'activo',
            'fechaCreacion' => now(),
            'password' => bcrypt('12345678'),        
        ]);
        User::create([         
            'name' => 'Carlos',
            'email' => 'c@gmail.com',
            'estado' => 'activo',
            'fechaCreacion' => now(),
            'password' => bcrypt('12345678'),         
        ]); 
        Rol::create([         
            'rolUsuario' => 'Administrador'          
        ]); 
        Rol::create([         
            'rolUsuario' => 'Empleado'          
        ]);
        Rol::create([         
            'rolUsuario' => 'Cliente'          
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
    }
}
