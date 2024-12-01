<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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

use Barryvdh\DomPDF\Facade\Pdf;

use Stripe;


class VentaController extends Controller
{
    public function factura_cliente(){
        $cliente = Cliente::all();
        $almacen = Almacenes::all();
        $producto = Producto::all();
        $factura = FacturaVenta::all();
        return view('cliente.factura', compact('factura', 'cliente', 'almacen', 'producto'));
    }

    public function crear_factura_cliente(Request $request)
    {
        
        $request->validate([
            'cliente_id' => 'required|exists:clientes,id',
            'almacen_id' => 'required|exists:almacenes,id',
            'producto_id' => 'required|exists:productos,id',
            'nit' => 'required|numeric|min:0',
            'nro' => 'required|numeric|min:0',
            'cod_aut' => 'required|numeric|min:0',
            'cantidad' => 'required|numeric|min:1',
            'precio_unitario' => 'required|numeric|min:0',
            'descuento' => 'required|numeric|min:0',
            'descripcion_monto' => 'required|string|max:255',
        ]);
       
            $factura = new FacturaVenta;
            $factura->cliente_id = $request->cliente_id;
            $factura->almacen_id = $request->almacen_id;
            $factura->producto_id = $request->producto_id;
            $factura->nit = $request->nit;
            $factura->nro = $request->nro;
            $factura->cod_aut = $request->cod_aut;
            $factura->cantidad = $request->cantidad;
            $factura->precio_unitario = $request->precio_unitario;
            $factura->descuento = $request->descuento;
            $factura->subtotal = ($factura->cantidad * $factura->precio_unitario) - $request->descuento;
            $factura->descripcion_monto = $request->descripcion_monto;           
            $factura->save();                
        return redirect()->back()->with('mensaje', 'Factura creada exitosamente con NRO: ' . $factura->nro);  
    }

    public function imprimir_factura(){
        $cliente = Cliente::all();
        $almacen = Almacenes::all();
        $producto = Producto::all();
        $factura = FacturaVenta::all();
        return view('cliente.ver_factura', compact('factura', 'cliente', 'almacen', 'producto'));
    }


    public function cliente(){
        $cliente = Cliente::all();
        return view('cliente.cliente', compact('cliente'));
    }

    public function crear_cliente(Request $request){
        $request->validate([
            'codigo' => 'required',
            'ci' => 'required',
            'nombre' => 'required',
        ]);
        
            $cliente = new Cliente;
            $cliente->codigo = $request->codigo;
            $cliente->ci = $request->ci;
            $cliente->nombre = $request->nombre;
            $cliente->save();
        return redirect()->back()->with('mensaje', 'Cliente agregado al carrito exitosamente');
    }

     // Name: Test
        // Number: 4242 4242 4242 4242
        // CSV: 123
        // Expiration Month: 12
        // Expiration Year: 2028

        // action="{{ route('stripe.post') }}"  
        
    public function logout()
    {
        Auth::logout(); // Este es el método correcto para cerrar sesión
        return view('login');
    }

    public function detalle_producto($id){
        $producto = Producto::find($id);
        return view('producto.detalle', compact('producto'));
    }

     public function agregar_carrito(Request $request, $id) {
            if (Auth::id()) {

                $usuario = Auth::user();
                $producto = Producto::find($id);
                $carrito = new Carrito;
                $carrito->nombreUsuario = $usuario->name;
                $carrito->correo = $usuario->email;
                $carrito->telefono = $usuario->telefono;
                $carrito->direccion = $usuario->direccion;
                $carrito->usuario_id = $usuario->id;

                $carrito->nombreProducto = $producto->nombre;

               if($producto->precioDescuento != null){
                    $carrito->importe = $producto->precioDescuento * $request->cantidad;

                    $carrito->precioVenta = $producto->precioDescuento;
               }else{
                    $carrito->importe = $producto->precioVenta * $request->cantidad;

                    $carrito->precioVenta = $producto->precioVenta;
               }
                $carrito->imagen_url = $producto->imagen_url;
                $carrito->producto_id = $producto->id;

                $carrito->cantidad = $request->cantidad;
                $carrito->save();
                return redirect()->back()->with('mensaje','agregado al carrito exitosanmente');
                } 
            else {
                return redirect('login');
            }
        }

        public function ver_carrito() {
            $carrito = Carrito::where('usuario_id', Auth::id())->get();
            return view('carrito.inicio', compact('carrito'));
        }
        
        public function eliminar_carrito($id){
            $carrito = Carrito::find($id);
            $carrito->delete();
            return redirect()->back()->with('mensaje','elminado exitosanmente');
        }

        
        public function ver_pedido(){
            if (Auth::id()) {
                $user = Auth::User();
                $userid = $user->id;
                $data = Carrito::where('usuario_id','=', $userid)->get();
                foreach($data as $data){
                    $order = new Pedido;
                    $order->nombreUsuario = $data->nombreUsuario;
                    $order->correo = $data->correo;
                    $order->telefono = $data->telefono;
                    $order->direccion = $data->direccion;
                    $order->usuario_id = $data->usuario_id;
                    $order->nombreProducto = $data->nombreProducto;
                    $order->precioVenta = $data->precioVenta;
                    $order->importe = $data->importe;
                    $order->cantidad = $data->cantidad;
                    $order->imagen_url = $data->imagen_url;
                    $order->producto_id = $data->product_id;
        
                    $order->estado_pago = 'POR ENTREGAR';
                    $order->estado_entrega = 'PROCESANDO';
                    $order->save();
        
                    $cart_id = $data->id;
                    $cart = Carrito::find($cart_id);
                    $cart->delete();
                } 
                return redirect() ->back()->with('mensaje',
                'Hemos recibido su pedido, nos contactaremos con usted pronto');
            }
        }
    
        public function stripe($totalAPagar){   
            return view('stripe.inicio', compact('totalAPagar'));
        }
    
        public function stripePost(Request $request, $totalprice)
        {
            Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        
            Stripe\Charge::create ([
                    "amount" => $totalprice * 100,
                    "currency" => "usd",
                    "source" => $request->stripeToken,
                    "description" => "GRACIAS POR TU COMPRA" 
            ]);
            $user = Auth::User();
            $userid = $user->id;
            $data = Carrito::where('usuario_id','=', $userid)->get();
            foreach($data as $data){
                $order = new Pedido;
                $order->nombreUsuario = $data->nombreUsuario;
                $order->correo = $data->correo;
                $order->telefono = $data->telefono;
                $order->direccion = $data->direccion;
                $order->usuario_id = $data->usuario_id;
                $order->nombreProducto = $data->nombreProducto;
                $order->precioVenta = $data->precioVenta;
                $order->importe = $data->importe;
                $order->cantidad = $data->cantidad;
                $order->imagen_url = $data->imagen_url;
                $order->producto_id = $data->product_id;
    
                $order->estado_pago = 'PAGADO';
                $order->estado_entrega = 'PROCESANDO';
                $order->save();
    
                $cart_id = $data->id;
                $cart = Carrito::find($cart_id);
                $cart->delete();
            } 
            Session::flash('success', 'PAGO CON EXITO!');
            return back();
        }
//------------------------------------------------------------
        public function ver_cliente() {
            // Obtener los usuarios que no tienen ningún rol asignado
            $usuario = User::doesntHave('roles')->get();
            
            // Pasar los datos a la vista
            return view('cliente.inicio', compact('usuario'));
        }         

        public function mostrar_pedido(){
            $pedido = Pedido::all();
            return view('pedido.inicio', compact('pedido'));
        }
    
        public function entrega($id){
            $pedido = Pedido::find($id);
            $pedido->estado_pago = "CANCELADO";
            $pedido->estado_entrega = "ENTREGADO";
            $pedido->save();
            return redirect()->back()->with('mensaje',  'Cambiado exitosamente');
        }


        public function generarPDF()
        {
            // Obtener los datos de la tabla
            $pedidos = Pedido::all(); // Reemplaza con la tabla que deseas

            // Generar el PDF
            $pdf = PDF::loadView('pdf.todo', compact('pedidos'));

            // Descargar el PDF
            return $pdf->download('todo.pdf');
        }

        public function imprimir($id)
        {
            // Obtener los datos de la tabla
            $pedido = Pedido::find($id);

            // Verificar si el pedido existe
            if (!$pedido) {
                return redirect()->back()->with('error', 'El pedido no existe.');
            }

            // Generar el PDF
            $pdf = PDF::loadView('pdf.pedido', compact('pedido'));

            // Descargar el PDF
            return $pdf->download('pedido.pdf');
        }

        public function busqueda(Request $request)
        {
            $buscar = $request->search;

            $pedido = Pedido::where('nombreUsuario', 'LIKE', "%$buscar%")->orWhere(
                'telefono', 'LIKE', "%$buscar%")->orWhere(
                    'nombreProducto', 'LIKE', "%$buscar%" )->get();
            return view('pedido.inicio', compact('pedido'));                      

        }

        
       


}
