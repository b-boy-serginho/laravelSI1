<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Api;

class ApiController extends Controller
{
     // Mostrar usuarios
    public function api_usuario()
     {        
         $api = Api::all();
        //  dd($api);
        return json_encode($api);
    }

    public function api_usuario_id($user_id)
     {    
        $usuario = Api::find($user_id);    
        return json_encode($usuario);
    }
 
    public function mostrar_usuario2(Request $request)
     {    
        $usuario = Api::find($request->user_id);    
        return json_encode($usuario);
    }

     // Crear un nuevo usuario
    public function crear_usuario(Request $request)
     {
        // Validar los datos de entrada
        $request->validate([
             'nombre' => 'required|string|max:255',
             'correo' => 'required|email|max:255',
             'telefono' => 'required|numeric',
             'fecha' => 'required|date_format:Y-m-d\TH:i', // Formato para datetime-local
        ]);
 
         // Crear el nuevo usuario
        $usuario = new Api();
        $usuario->nombre = $request->nombre;
        $usuario->correo = $request->correo;
        $usuario->telefono = $request->telefono;
        $usuario->fecha = $request->fecha;
        $usuario->save();
        $mensaje = 'Usuario creado correctamente';
        return json_encode($mensaje);
    }


}
