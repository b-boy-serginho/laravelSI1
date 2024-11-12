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
use App\Models\Bitacora;
use Carbon\Carbon;
use App\Models\Producto;
use App\Models\Categoria;
use App\Models\Comentario;
use App\Models\Respuesta;


class ControllerUsuario extends Controller
{

    public function inicio(){
        $producto = Producto::all();
        $categoria = Categoria::all();
        $comentario = Comentario::all();    
        $respuesta = Respuesta::all();    
        return view('usuario.inicio', compact('producto', 'categoria', 'comentario', 'respuesta'));
    }

    // public function redireccionar()
    // {
    //     $userId = Auth::user()->id;
    //     $usuarioRol = UsuarioRol::where('usuario_id', $userId)->first();

    //     if ($usuarioRol) {
    //         $rolId = $usuarioRol->rol_id;

    //         // Verificar el rol del usuario y redirigir al lugar correcto
    //         switch ($rolId) {
    //             case 1:
    //                 // Si es administrador
    //                 return view('usuario.admin'); // Redirige a la ruta 'admin.inicio'
    //             case 2:
    //                 // Si es empleado
    //                 return view('usuario.empleado');
    //             case 3:
    //                 // Si es cliente
    //                 return view('usuario.cliente');
    //             default:
    //                 return redirect('/')->with('error', 'Rol no reconocido.');
    //         }
    //     }
    //     else {
    //         return redirect('/')->with('error', 'No se ha asignado un rol a este usuario.');
    //     }
    // }

    public function redireccionar(){
        $tipoRol = Auth::User()->rolUsuario;
        if ($tipoRol == 1){
            return view('usuario.admin');
        }
        else{                 
            $producto = Producto::all();
            $categoria = Categoria::all();
            $comentario = Comentario::all();    
            $respuesta = Respuesta::all();    
            return view('usuario.inicio', compact('producto', 'categoria', 'comentario', 'respuesta'));
            }
    }





    public function ver_rol() {
        $rol = Rol::all();
        $usuario = User::all();
        $usuario_rol = UsuarioRol::all();
        return view('rol.inicio', compact('rol','usuario','usuario_rol'));
    }

    public function crear_rol(Request $request) {
        $request->validate([
            'usuario_id' => 'required',
            'rol_id' => 'required',
        ]);

        $usuario_rol = new UsuarioRol;
        $usuario_rol->usuario_id = $request->usuario_id;
        $usuario_rol->rol_id = $request->rol_id;
        $usuario_rol->save();

        return redirect()->back()->with('mensaje','agregado exitosamente');
    }

    public function editar_rol($id)
    {
        $rol = Rol::all();
        $usuario = User::all();
        $usuario_rol = UsuarioRol::find($id);
        return view('rol.editar', compact('rol','usuario','usuario_rol'));
    }

    public function editarRol(Request $request, $id) {

        $usuario_rol = UsuarioRol::find($id);
        $usuario_rol->usuario_id = $request->usuario_id;
        $usuario_rol->rol_id = $request->rol_id;
        $usuario_rol->save();

        return redirect()->back()->with('mensaje', '¡Actualizado exitosamente!');
    }

    public function borrar_rol($id){
        $borrar = UsuarioRol::find($id);
        $borrar->delete();
        return redirect()->back()->with('mensaje','eliminado exitosanmente');
    }

    //--------------------------------------------------------------------------

    public function ver_horario() {
        $horarios = Horario::all();

        return view('horario.inicio', compact('horarios'));
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
        return redirect()->back()->with('mensaje','eliminado exitosanmente');
    }

    //---------------------------------------------------------------------------------------


    public function ver_empleado() {
        $horarios = Horario::all();
        $empleados = Empleado::all();
        $bitacora= Bitacora::all();        
        return view('empleado.inicio', compact('horarios', 'empleados', 'bitacora'));
    }

    public function bitacora()
    {
        $bitacora = Bitacora::all();
        $empleados = Empleado::all();
        return view('bitacora.inicio', compact('bitacora', 'empleados'));
    }

    public function crear_empleado(Request $request)
    {
        $request->validate([
            
            'ci' => 'required|integer',
            'nombre' => 'required|string',
            'sexo' => 'required|string',
            'fechaContratacion' => 'required',
            'cargo' => 'required|string|max:40',
            'idHorario' => 'required|exists:horarios,id',
        ]);

        $empleados = new Empleado;
        $empleados->ci = $request->ci;
        $empleados->nombre = $request->nombre;
        $empleados->sexo = $request->sexo;
        $empleados->fechaContratacion = $request->fechaContratacion;
        $empleados->cargo = $request->cargo;
        $empleados->idHorario = $request->idHorario;
        $empleados->save();

        $bitacora = new Bitacora();
        $bitacora->descripcion = "Creación de Empleado exitosa";
        $bitacora->usuario_id = auth()->user()->id;
        $bitacora->usuario = $request->nombre;
        $bitacora->direccion_ip = $request->ip();
        $bitacora->navegador = $request->header('user-agent');

        $bitacora->tabla = "Empleados";
        $bitacora->registro_id = $empleados->id;
        $bitacora->fecha_hora = $empleados->fechaContratacion;
        $bitacora->save();

        return redirect()->back()->with('mensaje','Empleado agregado exitosanmente');
    }

    public function editar_empl($id) {
        $horarios = Horario::all();
        $empleados = Empleado::findOrFail($id);
        $usuarios = DB::table('users')
        ->select('users.id', 'users.name')
        ->join('usuario_rols', 'users.id', '=', 'usuario_rols.usuario_id')
        ->join('rols', 'rols.id', '=', 'usuario_rols.rol_id')
        ->where('rols.id', 2)
        ->get();
        return view('empleado.editar', compact('horarios', 'empleados', 'usuarios'));
    }

    public function editar_empleado(Request $request, $id) {
        $empleados = Empleado::findOrFail($id);
        $request->validate([
            'idUsuario' => 'required|integer',
            'ci' => 'required|integer',
            'name' => 'required',
            'sexo' => 'required',
            'fechaContratacion' => 'required|date',
            'cargo' => 'required|string|max:40',
            'idHorario' => 'required|exists:horarios,id',
        ]);

        $empleados->idUsuario = $request->idUsuario;
        $empleados->ci = $request->ci;
        $empleados->name = $request->name;
        $empleados->sexo = $request->sexo;
        $empleados->fechacontratacion = $request->fechaContratacion;
        $empleados->cargo = $request->cargo;
        $empleados->idHorario = $request->idHorario;
        $empleados->save();

        return redirect()->back()->with('mensaje', 'Actualizado exitosamente');
    }

    public function borrar_empleado($id){
        Empleado::findOrFail($id)->delete();
        return redirect()->back()->with('mensaje', 'Empleado Eliminado exitosamente');
    }

    //----------------------------------------------------------------------

    public function ver_cliente(){

        return view('cliente.inicio');
    }

    public function agregar_comentario(Request $request){

        if(Auth::id()){
            $comentario = new Comentario;
            $comentario->usuario_id = Auth::User()->id;
            $comentario->nombre = Auth::User()->name;
            $comentario->comentario = $request->comentario;
            $comentario->save();
            return redirect()->back();
        }
        return view('login');
    }

    public function agregar_respuesta(Request $request){

        if(Auth::id()){
            $respuesta = new Respuesta;
            $respuesta->usuario_id = Auth::User()->id;
            $respuesta->comentario_id = $request->comentarioId;
            $respuesta->nombre = Auth::User()->name;
            $respuesta->respuesta = $request->respuesta;
            $respuesta->save();
            return redirect()->back();
        }
        return view('login');
    }
    

   






}
