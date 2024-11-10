<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Categoria;
use App\Models\Etiqueta;
use App\Models\Producto;

class VentaController extends Controller
{
    public function detalle_producto($id){
        $producto = Producto::find($id);
        return view('producto.detalle', compact('producto'));
    }


}
