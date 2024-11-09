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
        Schema::create('detallepedido', function (Blueprint $table) {
            $table->id();
            $table->integer('cantidad');
            $table->float('precio_unitario');
            //llave foranea producto

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detallepedido');
    }
};
