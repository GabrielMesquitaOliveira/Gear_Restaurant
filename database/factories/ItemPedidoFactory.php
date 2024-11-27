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
        $produto = Produto::inRandomOrder()->first();
        $quantidade = $this->faker->numberBetween(1, 5);

        return [
            'quantidade' => $quantidade,
            'total' => $quantidade * $produto->preco,
            'pedido_id' => Pedido::inRandomOrder()->first()->id,
            'produto_id' => $produto->id,
        ];
    }
}
