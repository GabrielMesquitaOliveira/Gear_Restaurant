<?php

namespace Database\Seeders;

use App\Models\CategoriaProduto;
use Illuminate\Database\Seeder;

class CategoriaProdutoSeeder extends Seeder
{
    public function run(): void
    {
        $categorias = [
            'Bebidas',
            'Sobremesas',
            'Pratos Principais',
            'Entradas',
            'Acompanhamentos',
            'Molhos',
            'Carnes',
            'Vegetarianos',
            'Massas',
            'Pizzas',
            'Sanduíches',
        ];

        foreach ($categorias as $categoria) {
            CategoriaProduto::factory()->create(['nome' => $categoria]);
        }
    }
}
