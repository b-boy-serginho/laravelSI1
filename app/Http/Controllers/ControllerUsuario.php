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

use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;


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

    // public function redireccionar(){
    //     $tipoRol = Auth::User()->rolUsuario;
    //     if ($tipoRol == 1){
    //         return view('usuario.admin');
    //     }
    //     else{                 
    //         $producto = Producto::all();
    //         $categoria = Categoria::all();
    //         $comentario = Comentario::all();    
    //         $respuesta = Respuesta::all();    
    //         return view('usuario.inicio', compact('producto', 'categoria', 'comentario', 'respuesta'));
    //     }
    // }


    public function redireccionar(){
        $user = Auth::user();

        // Verificar el rol del usuario y redirigir
        if ($user->hasRole('Admin')) {
            return view('usuario.admin'); // Ruta para el dashboard de Admin
        } elseif ($user->hasRole('Empleado')) {
            $categoria = Categoria::all();
            return view('categoria.inicio', compact('categoria')); // Ruta para la vista inicial de Empleado
        } else {
            $producto = Producto::all();
            $categoria = Categoria::all();
            $comentario = Comentario::all();    
            $respuesta = Respuesta::all();    
            return view('usuario.inicio', compact('producto', 'categoria', 'comentario', 'respuesta'));
        }
    }

    //------------------------------------------------------------------------

    public function ver_usuario() {
        $roles = Role::all();  // Obtiene todos los roles
        return view('rolPermiso.inicio', compact('roles'));
    }

    public function editar_usuario($id) {
        $role = Role::find($id);  // Busca el rol por ID
        $permiso = Permission::all();  // Obtiene todos los permisos
        return view('rolPermiso.editar', compact('permiso', 'role'));
    }
    
    public function actualizar_usuario(Request $request, $id) {
        $role = Role::find($id);  // Encuentra el rol a actualizar
        $role->permissions()->sync($request->input('permiso', []));  // Sincroniza los permisos seleccionados
        return redirect()->route('ver_usuario')->with('mensaje', 'Roles asignados exitosamente');;
    }
    
    //----------------------------------------------------------------
    public function ver_usuario_permiso() {
        $usuario = User::all();          
        return view('rolPermiso.usuario', compact('usuario'));
    }

    public function crear_usuario(Request $request){
        $existingUsuario = User::where('id', $request->id)->first();
        // Si el ID ya existe, devuelve un mensaje de error
        if ($existingUsuario) {
            return redirect()->back()->with('error', 'El ID ya está en uso. Por favor, elige otro ID.');
        }
    
        $usuario=new User;
        $usuario->id= $request->id;
        $usuario->name= $request->name;
        $usuario->email= $request->email;
        $usuario->fechaCreacion= now();
        // $usuario->direccion= $request->direccion;
        // $usuario->telefono= $request->telefono;
        $usuario->estado= $request->estado;

        $usuario->password = bcrypt($request->password);
        $usuario->save();
        return redirect()->back()->with('mensaje','agregado exitosanmente');
    }
    
    public function editar_usuario_rol($id) {
        $usuario = User::findOrFail($id);  // Usa 'findOrFail' para manejo de errores
        $roles = Role::all();  // Obtiene todos los roles
        return view('rolPermiso.editarRolUsuario', compact('usuario', 'roles'));
    }
    
    public function editar_rol_user(Request $request, $id) {
        $usuario = User::findOrFail($id);  // Encuentra el usuario a actualizar
        $usuario->roles()->sync($request->input('roles', []));  // Sincroniza los roles seleccionados
        return redirect()->route('ver_usuario_permiso')->with('mensaje', 'Roles asignados exitosamente');
    }
    //-------------------------------------------------------
    public function ver_permiso() {
        $permiso = Permission::all(); 
         return view('rolPermiso.permiso', compact('permiso'));
    }

    public function crear_permiso(Request $request) {
        $permiso = Permission::create(['name' => $request->input('nombre')]);

        return redirect()->back()->with('mensaje','agregado exitosanmente');
    }
    
    //----------------------------------------------------------------

    

    // public function editar_nuevo_usuario(Request $request, $id) {
    //     $usuario = User::find($id);       
    //     $usuario->id= $request->id;
    //     $usuario->ci= $request->ci;
    //     $usuario->nombres= $request->nombres;
    //     $usuario->apellido_paterno= $request->apellido_paterno;
    //     $usuario->apellido_materno= $request->apellido_materno;
    //     $usuario->telefono= $request->telefono;
    //     $usuario->direccion= $request->direccion;
    //     $usuario->sexo= $request->sexo;
    //     $usuario->email= $request->email;
    //     $usuario->password = bcrypt($request->password);
    //     $usuario->save();
    //     return redirect()->back()->with('message','agregado exitosanmente');
    // }

    // public function borrar_Usuario($id){
    //     $borrar = User::find($id);
    //     $borrar->delete();
    //     return redirect()->back()->with('message','eliminado exitosanmente');
    // }

    
    //------------------------------------------------------------------------------------

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
        // Obtener solo los usuarios que tienen el rol 'Empleado'
        $usuario = User::role('Empleado')->get();
    
        $horarios = Horario::all();
        $empleados = Empleado::all();
        $bitacora = Bitacora::all();
    
        return view('empleado.inicio', compact('horarios', 'empleados', 'bitacora', 'usuario'));
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
        $empleados->idUsuario = $request->idUsuario;
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
        $empleado = Empleado::findOrFail($id);
          // Obtener solo los usuarios que tienen el rol 'Empleado'
        $usuarios = User::role('Empleado')->get();        
        $horarios = Horario::all();
        $bitacora = Bitacora::all();    
        return view('empleado.editar', compact('horarios', 'empleado', 'bitacora', 'usuarios'));
    }

    public function editar_empleado(Request $request, $id) {
        $empleados = Empleado::findOrFail($id);
        $request->validate([
            'idUsuario' => 'required|integer',
            'ci' => 'required|integer',
            'nombre' => 'required',
            'sexo' => 'required',
            'fechaContratacion' => 'required|date',
            'cargo' => 'required|string|max:40',
            'idHorario' => 'required|exists:horarios,id',
        ]);

        $empleados->idUsuario = $request->idUsuario;
        $empleados->ci = $request->ci;
        $empleados->nombre = $request->nombre;
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
