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
        Schema::create('salida_movimientos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_productos')->constrained('productos')->onDelete('cascade');
            $table->integer('cantidad');
            //$table->foreignId('id_beneficiario')->constrained('beneficiarios');
            $table->date('fecha_salida');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('salida_movimientos');
    }
};
