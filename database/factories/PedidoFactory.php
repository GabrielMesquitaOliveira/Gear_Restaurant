<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Mesa;
use App\Models\Cliente;
use App\Models\Pedido;

class PedidoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Pedido::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'status' => $this->faker->randomElement(["Aguardando","Processando","Concluido","Cancelado"]),
            'status_pagamento' => $this->faker->randomElement(["Pendente","Pago","Cancelado"]),
            'forma_pagamento' => $this->faker->randomElement(["Cartao","Dinheiro","Pix"]),
            'mesa_id' => Mesa::factory(),
            'cliente_id' => Cliente::factory(),
        ];
    }
}
