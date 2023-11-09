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
        Schema::create('procesales', function (Blueprint $table) {
            $table->id();
            $table->string('id_proceso');
            $table->text('descripcion');
            $table->string('tipo');
            $table->string('solicitado');
            $table->string('sustento');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('procesales');
    }
};
