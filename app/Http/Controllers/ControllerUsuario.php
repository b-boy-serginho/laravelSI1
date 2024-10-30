<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use Session;
use App\Models\User;
use App\Models\Rol;
use App\Models\UsuarioRol;
use Illuminate\Support\Facades\Auth;    
use Illuminate\Support\Facades\Storage;
use App\Models\Empleado;
use App\Models\Horario;

class ControllerUsuario extends Controller
{

    public function inicio(){
        return view('usuario.inicio');
    }

    public function redireccionar()
    {
        $userId = Auth::user()->id;
        $usuarioRol = UsuarioRol::where('user_id', $userId)->first();

        if ($usuarioRol) {
            $rolId = $usuarioRol->rol_id;
            
            // Verificar el rol del usuario y redirigir al lugar correcto
            switch ($rolId) {
                case 1:
                    // Si es administrador
                    return view('usuario.admin'); // Redirige a la ruta 'admin.inicio'
                case 2:
                    // Si es empleado
                    return view('usuario.empleado'); 
                case 3:
                    // Si es cliente
                    return view('usuario.cliente');
                default:
                    return redirect('/')->with('error', 'Rol no reconocido.');
            }
        } 
        else {
            return redirect('/')->with('error', 'No se ha asignado un rol a este usuario.');
        }
    }

    public function logeado()
    {
        $userId = Auth::user()->id;
        $usuarioRol = UsuarioRol::where('user_id', $userId)->first();

        if ($usuarioRol) {
            $rolId = $usuarioRol->rol_id;
            
            // Verificar el rol del usuario y redirigir al lugar correcto
            switch ($rolId) {
                case 1:
                    // Si es administrador
                    return view('usuario.admin'); // Redirige a la ruta 'admin.inicio'
                case 2:
                    // Si es empleado
                    return view('usuario.empleado'); 
                case 3:
                    // Si es cliente
                    return view('usuario.cliente');
                default:
                    return redirect('/')->with('error', 'Rol no reconocido.');
            }
        } else {
            return redirect('/')->with('error', 'No se ha asignado un rol a este usuario.');
        }
    }

    public function ver_horario() {
        $horarios = Horario::all(); // Obtener todos los horarios para listarlos
        
        return view('horario.ver_horario', compact('horarios')); // Mostrar vista de horarios
    }

    public function crear_horario(Request $request)
    {
        $request->validate([
            'horainicio' => 'required',
            'horafinal' => 'required',
            'dias' => 'required',
        ]);

        $horarios = new Horario;
        $horarios->horainicio = $request->horainicio;
        $horarios->horafinal = $request->horafinal;
        $horarios->dias = $request->dias;

        $horarios->save();
        return redirect()->back()->with('mensaje','agregado exitosanmente');
    }

    public function editar($id)
    {
        $horarios = Horario::findOrFail($id); // Encontrar el horario por su ID
        return view('horario.editar', compact('horarios')); // Retornar la vista con el horario para editar
    }

    public function editar_horario(Request $request, $id)
    {
        $horarios = Horario::findOrFail($id); // Buscar el horario por ID
        $request->validate([
            'horainicio' => 'required',
            'horafinal' => 'required',
            'dias' => 'required',
        ]);
        $horarios->horainicio = $request->horainicio;
        $horarios->horafinal = $request->horafinal;
        $horarios->dias = $request->dias;       
    
        $horarios->save();
        return redirect()->back()->with('mensaje','actualizado exitosamente');
    }

    public function borrar_horario($id){
        $borrar = Horario::find($id);
        $borrar->delete();
        return redirect()->back()->with('message','eliminado exitosanmente');
    }

    public function ver_empleado() {        
        $horarios = Horario::all(); 
        $empleados = Empleado::all();        
        return view('horario.ver_horario', compact('horarios', 'empleados')); // Las variables deben ser pasadas separadamente
    }


    public function crear_empleado(Request $request)
    {
        $request->validate([
            'ci' => 'required|integer',
            'nombre' => 'required|string|max:60',
            'sexo' => 'required|in:M,F',
            'telefono' => 'required|integer',
            'direccion' => 'required|string|max:60',
            'fechacontratacion' => 'required|date',
            'cargo' => 'required|string|max:40',
            'idhorario' => 'required|exists:horarios,id',
        ]);

        $empleados = new Empleado;
        $empleados->ci = $request->ci;
        $empleados->nombre = $request->nombre;
        $empleados->sexo = $request->sexo;
        $empleados->telefono = $request->telefono;
        $empleados->direccion = $request->direccion;
        $empleados->fechacontratacion = $request->fechacontratacion;
        $empleados->cargo = $request->cargo;
        $empleados->idhorario = $request->idhorario;
        $empleados->save();
        return redirect()->back()->with('sms','agregado exitosanmente');
    }

    public function editar_empl($id)
    {
        $horarios = Horario::all();
        $empleados = Empleado::findOrFail($id);        
        return view('empleado.editar', compact('horarios', 'empleados'));  // Retornar la vista con el horario para editar
    }

    public function editar_empleado(Request $request, $id)
    {
        $empleados = Empleado::findOrFail($id); // Buscar el horario por ID
        $request->validate([
            'ci' => 'required|integer',
            'nombre' => 'required|string|max:60',
            'sexo' => 'required|in:M,F',
            'telefono' => 'required|integer',
            'direccion' => 'required|string|max:60',
            'fechacontratacion' => 'required|date',
            'cargo' => 'required|string|max:40',
            'idhorario' => 'required|exists:horarios,id',
        ]);

        $empleados->ci = $request->ci;
        $empleados->nombre = $request->nombre;
        $empleados->sexo = $request->sexo;
        $empleados->telefono = $request->telefono;
        $empleados->direccion = $request->direccion;
        $empleados->fechacontratacion = $request->fechacontratacion;
        $empleados->cargo = $request->cargo;
        $empleados->idhorario = $request->idhorario;
        $empleados->save();
        return redirect()->back()->with('mensaje','actualizado exitosamente');
    }

    public function borrar_empleado($id){
        Empleado::findOrFail($id)->delete(); // Eliminar el empleado por ID
        return redirect()->back()->with('message','eliminado exitosanmente');
    }



    

    
}
