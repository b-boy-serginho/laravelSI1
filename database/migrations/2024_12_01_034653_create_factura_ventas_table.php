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
        Schema::create('factura_ventas', function (Blueprint $table) {
            $table->id();

            $table->foreignId('cliente_id')->constrained('clientes')->cascadeOnUpdate()->cascadeOnDelete(); 
            $table->foreignId('almacen_id')->constrained('almacenes')->cascadeOnUpdate()->cascadeOnDelete(); 
            $table->foreignId('producto_id')->constrained('productos')->cascadeOnUpdate()->cascadeOnDelete(); 

           

            $table->decimal('cantidad', 12, 2);
            $table->decimal('precio_unitario', 12, 2);
            $table->decimal('descuento', 12, 2);
            $table->decimal('subtotal', 12, 2);            

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('factura_ventas');
    }
};
