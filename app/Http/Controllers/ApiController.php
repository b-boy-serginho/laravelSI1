<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Api;

class ApiController extends Controller
{
    public function api_usuario(){
        $api = Api::all();
        return view('api.inicio', compact('api'));
    }

   public function crear_usuario(Request $request)
   {
       // Validar los datos de entrada
       $request->validate([
           'nombre' => 'required|string|max:255',
           'correo' => 'required|email|max:255',
           'telefono' => 'required|numeric',
           'fecha' => 'required|date_format:Y-m-d\TH:i',  // Formato para datetime-local
       ]);

       // Crear el nuevo usuario
       $api = new Api;
       $api->nombre = $request->nombre;
       $api->correo = $request->correo;
       $api->telefono = $request->telefono;
       $api->fecha = $request->fecha;
       $api->save();

       // Redirigir a la vista con un mensaje
       return redirect()->route('api_usuario')->with('sms', 'Agregado exitosamente');
   }



}
