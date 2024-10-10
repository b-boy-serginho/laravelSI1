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
        Schema::create('horarios', function (Blueprint $table) {
            
            $table->id(); // Clave primaria
            $table->time('horainicio')->nullable(false); // Hora de inicio
            $table->time('horafinal')->nullable(false); // Hora de finalización
            $table->string('dias', 60)->nullable(false); // Días de la semana (Ej: "Lunes a Viernes")

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('horarios');
    }
};
