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

        Schema::create('produtos', function (Blueprint $table) {
            $table->id();
            $table->string('imagem')->nullable();
            $table->string('nome', 100);
            $table->decimal('preco', 10, 2);
            $table->text('descricao')->nullable();
            $table->boolean('disponivel')->default(true);
            $table->integer('quantidade_estoque')->default(0);
            $table->foreignId('categoria_produto_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->timestamps();
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produtos');
    }
};
