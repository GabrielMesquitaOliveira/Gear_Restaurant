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

        Schema::create('enderecos', function (Blueprint $table) {
            $table->id();
            $table->string('rua');
            $table->string('numero', 10);
            $table->string('bairro', 100);
            $table->string('cidade', 100);
            $table->char('estado', 2);
            $table->string('cep', 10);
            $table->string('complemento')->nullable();
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
        Schema::dropIfExists('enderecos');
    }
};
