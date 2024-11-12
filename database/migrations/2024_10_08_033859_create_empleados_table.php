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
        Schema::create('empleados', function (Blueprint $table) {

            $table->id(); // Clave primaria

            $table->foreignId('idHorario')->constrained('horarios')->cascadeOnUpdate()->cascadeOnDelete(); // Llave foránea

            $table->integer('ci')->nullable();
            $table->string('nombre');
            $table->char('sexo', 1)->nullable();
            $table->string('cargo', 40)->nullable(false); // Cargo 
            $table->datetime('fechaContratacion')->nullable(false); // Fecha de contratación


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('empleados');
    }
};
