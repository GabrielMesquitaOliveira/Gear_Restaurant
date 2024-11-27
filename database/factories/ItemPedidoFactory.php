<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\ItemPedido;
use App\Models\Pedido;
use App\Models\Produto;

class ItemPedidoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ItemPedido::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'quantidade' => $this->faker->numberBetween(1, 1000),
            'preco_unitario' => $this->faker->randomFloat(2, 0, 9999.99),
            'total' => $this->faker->randomFloat(2, 0, 9999.99),
            'pedido_id' => Pedido::factory(),
            'produto_id' => Produto::factory(),
        ];
    }
}
