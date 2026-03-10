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
    Schema::create('maestros', function (Blueprint $table) {
        $table->id();
        $table->string('nombre'); // Ej: Federica Peluche
        $table->string('estado')->default('En línea'); // Ej: En línea, Ocupado
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('maestros');
    }
};
