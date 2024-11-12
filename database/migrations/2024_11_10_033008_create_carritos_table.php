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
        Schema::create('carritos', function (Blueprint $table) {
            $table->id();

                        $table->string('nombreUsuario')->nullable();
                        $table->string('correo')->nullable();
                        $table->integer('telefono')->nullable();
                        $table->string('direccion')->nullable();
                        $table->string('nombreProducto')->nullable();
                        $table->integer('precioVenta')->nullable();
                        $table->integer('importe')->nullable();
                        $table->integer('cantidad')->nullable();
                        $table->string('imagen_url')->nullable();
                        $table->integer('producto_id')->nullable();
                        $table->integer('usuario_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('carritos');
    }
};
