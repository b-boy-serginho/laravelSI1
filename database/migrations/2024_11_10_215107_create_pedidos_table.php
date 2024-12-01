<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pedidos', function (Blueprint $table) {
            $table->id();

            // $table->foreignId('cliente_id')->constrained('users')->cascadeOnUpdate()->cascadeOnDelete(); 
            // $table->foreignId('producto_id')->constrained('productos')->cascadeOnUpdate()->cascadeOnDelete(); 

             //USUARIO
             $table->string('nombreUsuario')->nullable();
             $table->string('correo')->nullable();
             $table->string('telefono')->nullable();
             $table->string('direccion')->nullable();
             $table->string('usuario_id')->nullable();
            
             //PRODUCTO
             $table->string('nombreProducto')->nullable();
             $table->string('cantidad')->nullable();
             $table->string('precioVenta')->nullable();
             $table->string('importe')->nullable();
             $table->string('imagen_url')->nullable();
             $table->string('producto_id')->nullable();

             //PEDIDO
             $table->string('estado_pago')->nullable();
             $table->string('estado_entrega')->nullable();


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pedidos');
    }
};
