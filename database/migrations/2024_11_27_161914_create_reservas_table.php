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
        Schema::disableForeignKeyConstraints();

        Schema::create('reservas', function (Blueprint $table) {
            $table->id();
            $table->dateTime('data_hora');
            $table->enum('status', ["Pendente","Confirmada","Cancelada","Finalizada"]);
            $table->foreignId('mesa_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('cliente_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->timestamps();
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservas');
    }
};
