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
        Schema::create('consigas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('idProducto');
            $table->unsignedBigInteger('idEncargado')->nullable();
            $table->enum('estado', ['Pendiente', 'Aceptado', 'Rechazado'])->default('Pendiente');
            $table->text('mensaje')->nullable();
            $table->timestamps();

            $table->foreign('idProducto')->references('id')->on('productos');
            $table->foreign('idEncargado')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('consigas');
    }
};
