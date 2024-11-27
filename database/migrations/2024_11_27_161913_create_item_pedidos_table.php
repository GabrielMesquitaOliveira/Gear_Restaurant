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

        Schema::create('item_pedidos', function (Blueprint $table) {
            $table->id();
            $table->integer('quantidade');
            $table->decimal('total', 10, 2);
            $table->foreignId('pedido_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('produto_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->timestamps();
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('item_pedidos');
    }
};
