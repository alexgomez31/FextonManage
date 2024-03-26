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
        Schema::create('empleado', function (Blueprint $table) {
            $table->id();
            $table->string('names');
            $table->string('documento');
            $table->string('numdoc');
            $table->string('cargo');
            $table->date('fecha_ingreso');
            $table->date('fecha_fin');
            $table->string('nacionalidad');
            $table->string('ciudad');
            $table->string('direccion');
            $table->string('telefono');
            $table->string('email');
            $table->string('document_soport')->nullable();
            $table->string('contrato_soport')->nullable();
            $table->string('carta_soport')->nullable();
            $table->string('otro_si_soport')->nullable();
            $table->string('liquidaciones_soport')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('empleado');
    }
};
