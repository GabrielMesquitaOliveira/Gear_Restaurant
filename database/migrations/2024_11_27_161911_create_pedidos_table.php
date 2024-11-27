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

        Schema::create('pedidos', function (Blueprint $table) {
            $table->id();
            $table->enum('status', ["Aguardando","Processando","Concluido","Cancelado"]);
            $table->enum('status_pagamento', ["Pendente","Pago","Cancelado"]);
            $table->enum('forma_pagamento', ["Cartao","Dinheiro","Pix"]);
            $table->foreignId('mesa_id')->nullable()->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('cliente_id')->nullable()->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->timestamps();
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pedidos');
    }
};
