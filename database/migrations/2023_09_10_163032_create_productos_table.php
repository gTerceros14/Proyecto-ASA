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
        Schema::create('productos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_producto');
            $table->integer('cantidad');
            $table->foreignId('id_categoria')->constrained('categorias');
            $table->foreignId('id_talla')->nullable()->constrained('tallas');
            $table->foreignId('id_categoria_Alimentos')->nullable()->constrained('categoria_alimentos');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('producto_alimenticio');
    }
};
