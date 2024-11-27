<?php

namespace Database\Factories;

use App\Models\Atendimento;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Cliente;
use App\Models\Mesa;
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
            'valor' => $this->faker->randomFloat(2, 0, 99999999.99),
            'atendimento_id' => Atendimento::factory(),
            'mesa_id' => Mesa::factory(),
            'cliente_id' => Cliente::factory(),
        ];
    }
}
