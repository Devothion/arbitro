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
        Schema::create('procesos', function (Blueprint $table) {
            $table->id();
            $table->string('estado');
            $table->string('proceso');
            $table->string('med_cau');
            $table->string('cuantia');
            $table->string('moneda');
            $table->text('descripcion');
            $table->string('tribunal');
            $table->text('data_arb_dni');
            $table->text('data_arb_parte');
            $table->text('data_arb_estado');
            $table->text('id_demandante');
            $table->text('id_demandado');
            $table->text('dep_monto');
            $table->text('dep_fecha');
            $table->text('dep_file');
            $table->string('contrato');
            $table->text('cla_arb');
            $table->text('ane_nombre');
            $table->text('ane_doc');
            $table->text('observaciones')->nullable();;
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('procesos');
    }
};
