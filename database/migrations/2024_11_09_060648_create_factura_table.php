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
        Schema::create('factura', function (Blueprint $table) {
            $table->id();
            $table->date('fecha');  // Fecha de nacimiento
            $table->float('importe');  // Fecha de nacimiento
            $table->float('total');  // Fecha de nacimiento
            $table->integer('nro');  // Fecha de nacimiento
            //llave forajea de pedido
            // llave foranea de metodo de pago
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('factura');
    }
};
