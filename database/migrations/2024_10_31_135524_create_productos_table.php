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
        Schema::create('productos', function (Blueprint $table) {
            $table->id();

            $table->foreignId('categoria_id')->constrained('categorias')->onDelete('cascade');
            $table->string('cod')->nullable();
            $table->string('nombre')->nullable();
            $table->string('color')->nullable();
            $table->string('descripcion')->nullable();
            $table->integer('costoCompra')->nullable();
            $table->integer('costoPromedio')->nullable();
            $table->string('grosor')->nullable();
            $table->string('material')->nullable();
            $table->string('medida')->nullable();
            $table->integer('precioVenta')->nullable();
            $table->integer('cantidad')->nullable();
            $table->string('imagen_url')->nullable();
            $table->integer('precioDescuento')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('productos');
    }
};
