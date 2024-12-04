<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

use App\Models\Categoria;
use App\Models\Etiqueta;
use App\Models\Producto;

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
use App\Models\Carrito;
use App\Models\Pedido;
use App\Models\Cliente;
use App\Models\Almacenes;
use App\Models\FacturaVenta;


class ReporteController extends Controller
{

    public function reportePDF(Request $request)
    {
        // Obtener las fechas de inicio y fin desde el formulario
        $fechaInicio = $request->input('fechaInicio');
        $fechaFin = $request->input('fechaFin');

        // Obtener las fechas mínimas y máximas de los registros de la base de datos
        $fechaMin = \DB::table('pedidos')->min('created_at');
        $fechaMax = \DB::table('pedidos')->max('updated_at');

        // Validar si la fecha de inicio y fin son válidas
        if ($fechaInicio && $fechaInicio > $fechaMax ) {
            return back()->with('error', 'La fecha de inicio no es válida. Debe ser menor o igual a la fecha actual.');
        }

        if ($fechaFin && $fechaFin > $fechaMax) {
            return back()->with('error', 'La fecha de fin no es válida. Debe ser menor o igual a la fecha actual.');
        }

        // Obtener la lista de pedidos según los filtros
        $pedido = Pedido::query()
            ->when($request->nombreUsuario, function ($query, $nombreUsuario) {
                return $query->where('nombreUsuario', 'like', "%$nombreUsuario%");
            })
            ->when($request->nombreProducto, function ($query, $nombreProducto) {
                return $query->where('nombreProducto', 'like', "%$nombreProducto%");
            })
            ->when($fechaInicio, function ($query, $fechaInicio) {
                return $query->where('created_at', '>=', $fechaInicio);
            })
            ->when($fechaFin, function ($query, $fechaFin) {
                return $query->where('created_at', '<=', $fechaFin);
            })
            ->get();

        // Obtener los datos para los select
        $usuarios = \DB::table('pedidos')->select('nombreUsuario')->distinct()->pluck('nombreUsuario');
        $productos = \DB::table('pedidos')->select('nombreProducto')->distinct()->pluck('nombreProducto');

        // Generar el PDF
        if ($request->has('generate_pdf')) {
            $pdf = PDF::loadView('reporte.cantPed', compact('pedido'));
            return $pdf->download('reporte_pedidos.pdf');
        }

        return view('cliente.historial', compact('pedido', 'usuarios', 'productos', 'fechaMin', 'fechaMax'));
    }





    // public function generarPDF()
    //     {
    //         // Obtener los datos de la tabla
    //         $pedidos = Pedido::all(); // Reemplaza con la tabla que deseas

    //         // Generar el PDF
    //         $pdf = PDF::loadView('pdf.todo', compact('pedidos'));

    //         // Descargar el PDF
    //         return $pdf->download('todo.pdf');
    //     }

    // public function pdf_factura($id)
    // {
    //     $cliente = Cliente::findOrFail($id);
    //     $facturas = FacturaVenta::where('cliente_id', $id)->get();

    //     $pdf = PDF::loadView('pdf.imprimir_factura', compact('facturas', 'cliente'));

    //     return $pdf->download('factura_' . $cliente->nombre . '.pdf');
    // }

    
}
