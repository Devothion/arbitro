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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('ape_pat');
            $table->string('ape_mat');
            $table->string('name');
            $table->string('telefono');
            $table->string('telefono_opc');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('tip_calle');
            $table->string('nombre_calle');
            $table->string('numero');
            $table->string('urbanizacion');
            $table->string('referencia');
            $table->string('departamento');
            $table->string('provincia');
            $table->string('distrito');
            $table->string('dni')->unique();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
