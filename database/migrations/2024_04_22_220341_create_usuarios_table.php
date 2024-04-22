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
        Schema::create('usuarios', function (Blueprint $table) {
            $table->string('ine_ife')->primary();
            $table->string('nombre');
            $table->string('apellido_paterno');
            $table->string('apellido_materno');
            $table->date('fecha_nacimiento');
            $table->integer('no_telefono');
            $table->string('correo_electronico');
            $table->enum('sexo',['Masculino' , 'Femenino' , 'Prefiero no decirlo'])->default('Prefiero no decirlo');
            $table->string('direccion');
            $table->string('contra');
            $table->enum('rol',['Encargado','Cliente','Contador','Supervisor','Vendedor']) -> default('Cliente');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('usuarios');
    }
};
