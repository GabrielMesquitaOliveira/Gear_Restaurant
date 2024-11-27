<?php

namespace Database\Seeders;

use App\Models\Produto;
use Illuminate\Database\Seeder;

class ProdutoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Criação de produtos/pratos específicos
        $pratos = [
            [
                'nome' => 'Espaguete à Bolonhesa',
                'descricao' => 'Massa fresca com molho bolonhesa e queijo parmesão ralado.',
                'preco' => 29.90,
                'categoria_produto_id' => 3,
            ],
            [
                'nome' => 'Frango Grelhado com Legumes',
                'descricao' => 'Filé de frango grelhado acompanhado de legumes no vapor.',
                'preco' => 25.50,
                'categoria_produto_id' => 3,
            ],
            [
                'nome' => 'Pizza Margherita',
                'descricao' => 'Pizza tradicional com molho de tomate, mussarela, manjericão e azeite.',
                'preco' => 39.90,
                'categoria_produto_id' => 3,
            ],
            [
                'nome' => 'Hambúrguer Artesanal',
                'descricao' => 'Pão artesanal, hambúrguer de carne bovina, queijo cheddar, alface e tomate.',
                'preco' => 22.90,
                'categoria_produto_id' => 3,
            ],
            [
                'nome' => 'Salada Caesar',
                'descricao' => 'Salada com alface romana, croutons, queijo parmesão e molho caesar.',
                'preco' => 18.90,
                'categoria_produto_id' => 8,
            ],
        ];

        foreach ($pratos as $prato) {
            Produto::create($prato);
        }
    }
}
