<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\CategoriaProduto;
use App\Models\Produto;

class ProdutoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Produto::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'nome' => $this->faker->regexify('[A-Za-z0-9]{100}'),
            'preco' => $this->faker->randomFloat(2, 0, 299.99),
            'descricao' => $this->faker->text(),
            'disponivel' => $this->faker->boolean(),
            'quantidade_estoque' => $this->faker->numberBetween(0, 10000),
            'categoria_produto_id' => CategoriaProduto::inRandomOrder()->first()->id,
        ];
    }
}
