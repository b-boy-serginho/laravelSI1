<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FacturaVenta extends Model
{
        public function cliente()
        {
            return $this->belongsTo(Cliente::class, 'cliente_id', 'id');
        }
    
        public function almacen()
        {
            return $this->belongsTo(Almacenes::class, 'almacen_id', 'id');
        }
    
        public function producto()
        {
            return $this->belongsTo(Producto::class, 'producto_id', 'id');
        }
}
