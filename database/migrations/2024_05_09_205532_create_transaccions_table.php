<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransaccionsTable extends Migration
{
    public function up(): void
    {
        Schema::create('transaccions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('idProducto');
            $table->integer('cantidad');
            $table->decimal('precio', 14, 2);
            $table->unsignedBigInteger('idUsuario');
            $table->string('voucher')->nullable();
            $table->enum('estado', ['Rechazado','Pendiente', 'Aceptado'])->default('Pendiente');
            $table->timestamps();
            $table->integer('calificacion')->nullable();
            $table->foreign('idProducto')->references('id')->on('productos')->onDelete('cascade');
            $table->foreign('idUsuario')->references('id')->on('users')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('transaccions');
    }
}

