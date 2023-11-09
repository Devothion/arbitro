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
        Schema::create('arbitros', function (Blueprint $table) {
            $table->id();
            $table->string('dni');
            $table->string('ape_pat');
            $table->string('ape_mat');
            $table->string('name');
            $table->string('telefono');
            $table->string('email');
            $table->string('tip_calle');
            $table->string('nombre_calle');
            $table->string('numero');
            $table->string('urbanizacion');
            $table->string('referencia')->nullable();
            $table->string('departamento');
            $table->string('provincia');
            $table->string('distrito');
            $table->string('numero_reg');
            $table->string('file_reg');
            $table->string('profesion');
            $table->string('especialidad');
            $table->string('proceso')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('arbitros');
    }
};
