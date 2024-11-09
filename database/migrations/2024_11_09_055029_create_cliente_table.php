<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clientes', function (Blueprint $table) {
            $table->id('id');  // ID de cliente
            $table->integer('ci');  // Documento de identidad
            $table->string('correo')->unique();  // Correo electrónico
            $table->string('departamento');  // Departamento o región
            $table->date('fecha_nacimiento');  // Fecha de nacimiento
            $table->string('nombre');  // Nombre del cliente
            $table->enum('sexo', ['M', 'F']);  // Sexo del cliente
            $table->string('telefono')->nullable();  // Teléfono del cliente, puede ser nulo
            $table->timestamps();  // created_at y updated_at
            //lave foranea de usuario
            // llave de carrito

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clientes');
    }
}

