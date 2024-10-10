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
            $table->integer('ci')->nullable(false); // CI
            $table->string('nombre', 60)->nullable(false); // Nombre del empleado
            $table->char('sexo', 1)->nullable(false); // Sexo (suponiendo que usas un solo carácter)
            $table->integer('telefono')->nullable(false); // Teléfono
            $table->string('direccion', 60)->nullable(false); // Dirección
            $table->date('Fechacontratacion')->nullable(false); // Fecha de contratación
            $table->string('cargo', 40)->nullable(false); // Cargo            
            $table->foreignId('idhorario')->constrained('horarios')->cascadeOnUpdate()->cascadeOnDelete(); // Llave foránea


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
