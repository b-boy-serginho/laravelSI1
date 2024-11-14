<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Proveedor;
use App\Models\FacturaCompra;
use App\Models\DetalleCompra;
use App\Models\Categoria;
use App\Models\Etiqueta;
use App\Models\Producto;
use Illuminate\Support\Facades\Storage;
use App\Models\Inventario;


class ProductoController extends Controller
{
    public function ver_proveedor(){
        $proveedor = Proveedor::all();
        return view('proveedor.inicio', compact('proveedor'));
    }

    public function crear_proveedor(Request $request){
        $request->validate([
            'nombre' => 'required|string',
            'contacto' => 'required|string',
            'correo' => 'required|string|max:40',
            'direccion' => 'required|string',
            'telefono' => 'required|integer',
        ]);

        $proveedor = new Proveedor;
        $proveedor->nombre = $request->nombre;
        $proveedor->contacto = $request->contacto;
        $proveedor->correo = $request->correo;
        $proveedor->direccion = $request->direccion;
        $proveedor->telefono = $request->telefono;
        $proveedor->save();
        return redirect()->back()->with('mensaje','Proveedor agregado exitosanmente');
    }

    public function borrar_proveedor($id){
        $borrar = Proveedor::find($id);
        $borrar->delete();
        return redirect()->back()->with('mensaje','eliminado exitosanmente');
    }

    public function editar_proveedor($id) {
        $proveedor = Proveedor::find($id);
        return view('proveedor.editar', compact('proveedor'));
    }

    public function editarProveedor(Request $request, $id){
        $proveedor = Proveedor::find($id);
        $request->validate([
            'nombre' => 'required|string',
            'contacto' => 'required|string',
            'correo' => 'required|string|max:40',
            'direccion' => 'required|string',
            'telefono' => 'required|integer',
        ]);

        $proveedor->nombre = $request->nombre;
        $proveedor->contacto = $request->contacto;
        $proveedor->correo = $request->correo;
        $proveedor->direccion = $request->direccion;
        $proveedor->telefono = $request->telefono;
        $proveedor->save();
        return redirect()->back()->with('mensaje','Proveedor actualizado exitosanmente');
    }

//----------------------------------------------------------------------
    public function ver_factura(){
        $proveedor = Proveedor::all();
        $factura = FacturaCompra::all();
        $detalle = DetalleCompra::all();
        return view('factura.inicio', compact('factura', 'proveedor', 'detalle'));
    }

    public function crear_factura(Request $request){
        // $request->validate([
        //     'proveedor_id' => 'required|integer',
        //     'fecha' => 'required|date',
        // ]);
    
        $factura = new FacturaCompra;
        $factura->proveedor_id = $request->proveedor_id;
        $factura->fecha = $request->fecha;
    
        // Calcular el importe sumando cantidad * costoUnitario de cada detalle asociado al proveedor
        // $importeTotal = 0;
        $detalles = DetalleCompra::where('proveedor_id', '=', $request->proveedor_id)->get();
    
        foreach ($detalles as $detalle) {
            // $importeTotal += $detalle->cantidad * $detalle->costoUnitario;
            $importeTotal = $detalle->cantidad * $detalle->costoUnitario;
        }
    
        $factura->importe = $importeTotal;
        $factura->save();
    
        return redirect()->back()->with('mensaje', 'Factura agregada exitosamente');
    }
    

    public function borrar_factura($id){
        $borrar = FacturaCompra::find($id);
        $borrar->delete();
        return redirect()->back()->with('mensaje','eliminado exitosanmente');
    }

    public function editar_factura($id) {
        $proveedor = Proveedor::all();
        $factura = FacturaCompra::find($id);
        return view('factura.editar', compact('factura', 'proveedor'));
    }

    public function editarFactura(Request $request, $id){
        $factura = FacturaCompra::find($id);
        $request->validate([
            'proveedor_id' => 'required|integer',
            'fecha' => 'required|date',
            'importe' => 'required|integer',
        ]);

        $factura->proveedor_id = $request->proveedor_id;
        $factura->fecha = $request->fecha;
        $factura->importe = $request->importe;
        $factura->save();
        return redirect()->back()->with('mensaje','Factura actualozado exitosanmente');
    }

//--------------------------------------------------------------------------------------
    public function ver_categoria(){
        $categoria = Categoria::all();
        return view('categoria.inicio', compact('categoria'));
    }

    public function crear_categoria(Request $request){
        $request->validate([
            'nombre' => 'required|string',
            'descripcion' => 'required|string',
        ]);

        $categoria = new Categoria;
        $categoria->nombre = $request->nombre;
        $categoria->descripcion = $request->descripcion;
        $categoria->save();
        return redirect()->back()->with('mensaje','Categoria agregado exitosanmente');
    }

    public function borrar_categoria($id){
        $borrar = Categoria::find($id);
        $borrar->delete();
        return redirect()->back()->with('mensaje','eliminado exitosanmente');
    }

    public function editar_categoria($id) {
        $categoria = Categoria::find($id);
        return view('categoria.editar', compact('categoria'));
    }

    public function editarCategoria(Request $request, $id){
        $categoria = Categoria::find($id);
        $request->validate([
            'nombre' => 'required|string',
            'descripcion' => 'required|string',
        ]);

        $categoria->nombre = $request->nombre;
        $categoria->descripcion = $request->descripcion;
        $categoria->save();
        return redirect()->back()->with('mensaje','Categoria actualizado exitosanmente');
    }

    //--------------------------------------------------------------------------------------

    public function ver_producto(){
        $producto = Producto::all();
        $categoria = Categoria::all();
        return view('producto.inicio', compact('producto', 'categoria'));
    }

    public function crear_producto(Request $request){
//         $request->validate([
//             'categoria_id' => 'required|integer',
//             'cod' => 'required|string',
//             'nombre' => 'required|string',
//             'color' => 'required|string',
//             'descripcion' => 'required|string',
//             'costoCompra' => 'required|integer',
//             'costoPromedio' => 'required|integer',
//             'grosor' => 'required|string',
//             'material' => 'required|string',
//             'precioVenta' => 'required|integer',
//             'medida' => 'required|string',
//             'imagen_url' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // validación del archivo de imagen
//         ]);

        $producto = new Producto;
        $producto->categoria_id = $request->categoria_id;
        $producto->cod = $request->cod;
        $producto->nombre = $request->nombre;
        $producto->color = $request->color;
        $producto->descripcion = $request->descripcion;
        $producto->costoCompra = $request->costoCompra;
        $producto->costoPromedio = $request->costoPromedio;
        $producto->grosor = $request->grosor;
        $producto->material = $request->material;
        $producto->medida = $request->medida;
        $producto->cantidad = $request->cantidad;
        $producto->precioDescuento = $request->precioDescuento;
        $producto->precioVenta = $request->precioVenta;

         // Verificar si el archivo de imagen fue subido
        if ($request->hasFile('imagen_url')) {
            $foto = $request->file('imagen_url');
            $imageName = time() . '.' . $foto->getClientOriginalExtension();
            $foto->move(public_path('imagen'), $imageName); // Mover la imagen a la carpeta 'public/imagen'
            $producto->imagen_url = $imageName;
        }

        $producto->save();
        return redirect()->back()->with('mensaje','Producto agregado exitosanmente');
    }

    public function borrar_producto($id){
        $borrar = Producto::find($id);
        $borrar->delete();
        return redirect()->back()->with('mensaje','eliminado exitosanmente');
    }

    public function editar_producto($id) {
        $producto = Producto::find($id);
        $categoria = Categoria::all();
        return view('producto.editar', compact('producto', 'categoria'));
    }

    public function editarProducto(Request $request, $id){
        $producto = Producto::find($id);
//         $request->validate([
//             'categoria_id' => 'required|integer',
//             'cod' => 'required|string',
//             'nombre' => 'required|string',
//             'color' => 'required|string',
//             'descripcion' => 'required|string',
//             'costoCompra' => 'required|integer',
//             'costoPromedio' => 'required|integer',
//             'grosor' => 'required|string',
//             'material' => 'required|string',
//             'precioVenta' => 'required|integer',
//             'medida' => 'required|string',
//             'imagen_url' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // validación del archivo de imagen
//         ]);

        $producto->categoria_id = $request->categoria_id;
        $producto->cod = $request->cod;
        $producto->nombre = $request->nombre;
        $producto->color = $request->color;
        $producto->descripcion = $request->descripcion;
        $producto->costoCompra = $request->costoCompra;
        $producto->costoPromedio = $request->costoPromedio;
        $producto->grosor = $request->grosor;
        $producto->material = $request->material;
        $producto->medida = $request->medida;
        $producto->cantidad = $request->cantidad;
        $producto->precioVenta = $request->precioVenta;
        $producto->precioDescuento = $request->precioDescuento;

         // Verificar si el archivo de imagen fue subido
        if ($request->hasFile('imagen_url')) {
            $foto = $request->file('imagen_url');
            $imageName = time() . '.' . $foto->getClientOriginalExtension();
            $foto->move(public_path('imagen'), $imageName); // Mover la imagen a la carpeta 'public/imagen'
            $producto->imagen_url = $imageName;
        }

        $producto->save();
        return redirect()->back()->with('mensaje','Producto actualizado exitosanmente');
    }


    //----------------------------------------------------------------------------------
    public function ver_detalle(){
        $detalle = DetalleCompra::all();
        $proveedor = Proveedor::all();
        $producto = Producto::all();
        return view('detalleCompra.inicio', compact('detalle', 'proveedor', 'producto'));
    }

    public function crear_detalle(Request $request){
        $request->validate([
            'proveedor_id' => 'required|integer',
            'producto_id' => 'required|integer',
            'cantidad' => 'required|integer',
            'costoUnitario' => 'required|integer',
        ]);

        $detalle = new DetalleCompra;
        $detalle->proveedor_id = $request->proveedor_id;
        $detalle->producto_id = $request->producto_id;
        $detalle->cantidad = $request->cantidad;
        $detalle->costoUnitario = $request->costoUnitario;
        $detalle->save();
        return redirect()->back()->with('mensaje','Detalle de Compra agregado exitosanmente');
    }

    public function borrar_detalle($id){
        $borrar = DetalleCompra::find($id);
        $borrar->delete();
        return redirect()->back()->with('mensaje','eliminado exitosanmente');
    }

    public function editar_detalle($id) {
        $detalle = DetalleCompra::find($id);
        $proveedor = Proveedor::all();
        $producto = Producto::all();
        return view('detalleCompra.editar', compact('detalle', 'proveedor', 'producto'));
    }

    public function editarDetalle(Request $request, $id){
        $detalle = DetalleCompra::find($id);
        $request->validate([
            'proveedor_id' => 'required|integer',
            'producto_id' => 'required|integer',
            'cantidad' => 'required|integer',
            'costoUnitario' => 'required|integer',
        ]);

        $detalle->proveedor_id = $request->proveedor_id;
        $detalle->producto_id = $request->producto_id;
        $detalle->cantidad = $request->cantidad;
        $detalle->costoUnitario = $request->costoUnitario;
        $detalle->save();
        return redirect()->back()->with('mensaje','Detalle actualizado exitosanmente');
    }

    // ------------------------------------------------------------------------
    public function ver_etiqueta() {
        $etiqueta = Etiqueta::all();
        $producto = Producto::all();
        return view('etiqueta.inicio', compact('etiqueta', 'producto'));
    }

    public function crear_etiqueta(Request $request) {
        $etiqueta = new Etiqueta;
        $etiqueta->producto_id = $request->producto_id;
        $etiqueta->nombre = $request->nombre;
        $etiqueta->save();
        return redirect()->back()->with('mensaje','etiqueta creado exitosanmente');
    }

    public function ver_inventario() {
        $producto = Producto::all();
        $inventario = Inventario::all();
        return view('inventario.inicio', compact('inventario', 'producto'));
    }

    public function crear_inventario(Request $request){
    
        $inventario = new Inventario;
        $inventario->producto_id = $request->producto_id;
        $inventario->fechaActualizacion = $request->fechaActualizacion;
    
        $producto = Producto::where('id', '=', $request->producto_id)->get();
        $detalle = DetalleCompra::where('producto_id', '=', $request->producto_id)->get();

        $contador = 0;

        foreach ($detalle as $detalle) {    
            $contador = $contador + $detalle->cantidad;
        }
              
    
        $inventario->cantidad = $contador;
        $inventario->save();
    
        return redirect()->back()->with('mensaje', 'Factura agregada exitosamente');
    }


}
