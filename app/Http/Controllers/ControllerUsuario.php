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
use Illuminate\Support\Facades\DB;

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

    
    public function ver_horario() {
        $horarios = Horario::all(); 
        $empleados = Empleado::all();        
        return view('usuario.empleado', compact('horarios', 'empleados'));       
    }

    public function crear_horario(Request $request)
    {
        $request->validate([
            'horaInicio' => 'required',
            'horaFinal' => 'required',
            'dia' => 'required',
        ]);

        $horarios = new Horario;
        $horarios->horaInicio = $request->horaInicio;
        $horarios->horaFinal = $request->horaFinal;
        $horarios->dia = $request->dia;

        $horarios->save();
        return redirect()->back()->with('message','agregado exitosanmente');
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
            'horaInicio' => 'required',
            'horaFinal' => 'required',
            'dia' => 'required',
        ]);
        $horarios->horaInicio = $request->horaInicio;
        $horarios->horaFinal = $request->horaFinal;
        $horarios->dia = $request->dia;       
    
        $horarios->save();
        return redirect()->back()->with('sms','actualizado exitosamente');
    }

    public function borrar_horario($id){
        $borrar = Horario::find($id);
        $borrar->delete();
        return redirect()->back()->with('message','eliminado exitosanmente');
    }

    
    public function ver_empleado() {        
        $horarios = Horario::all(); 
        $empleados = Empleado::all();  
        $usuarios = DB::table('users')
            ->join('usuario_rols', 'users.id', '=', 'usuario_rols.user_id')
            ->join('rols', 'rols.id', '=', 'usuario_rols.rol_id')
            ->where('usuario_rols.user_id', 2)  // Puedes modificar el número para otro usuario específico
            ->select('users.id', 'users.name', 'rols.rolUsuario')
            ->get();
    
        return view('usuario.empleado', compact('horarios', 'empleados', 'usuarios'));
    }
    

    public function crear_empleado(Request $request)
    {
        $request->validate([           
            'idUsuario' => 'required|integer',
            'fechaContratacion' => 'required|date',
            'cargo' => 'required|string|max:40',
            'idHorario' => 'required|exists:horarios,id',
        ]);

        $empleados = new Empleado;
        $empleados->idUsuario = $request->idUsuario;
        $empleados->fechacontratacion = $request->fechaContratacion;
        $empleados->cargo = $request->cargo;
        $empleados->idHorario = $request->idHorario;
        $empleados->save();
        return redirect()->back()->with('message','Empleado agregado exitosanmente');
    }

    public function editar_empl($id) {
        $horarios = Horario::all(); 
        $empleados = Empleado::findOrFail($id);  
        $usuarios = DB::table('users')
        ->join('usuario_rols', 'users.id', '=', 'usuario_rols.user_id')
        ->join('rols', 'rols.id', '=', 'usuario_rols.rol_id')
        ->where('usuario_rols.user_id', 2)  // Puedes modificar el número para otro usuario específico
        ->select('users.id', 'users.name', 'rols.rolUsuario')
        ->get();
        return view('empleado.editar', compact('horarios', 'empleados', 'usuarios'));
    }
    
    public function editar_empleado(Request $request, $id) {
        $empleado = Empleado::findOrFail($id);
        $request->validate([
            'idUsuario' => 'required|integer',
            'fechaContratacion' => 'required|date',
            'cargo' => 'required|string|max:40',
            'idHorario' => 'required|exists:horarios,id',
        ]);
    
        $empleado->idUsuario = $request->idUsuario;
        $empleado->fechaContratacion = $request->fechaContratacion;
        $empleado->cargo = $request->cargo;
        $empleado->idHorario = $request->idHorario;
        $empleado->save();
    
        return redirect()->back()->with('mensaje', 'Actualizado exitosamente');
    }
    
    public function borrar_empleado($id){
        Empleado::findOrFail($id)->delete();
        return redirect()->back()->with('message', 'Empleado Eliminado exitosamente');
    }



    

    
}
