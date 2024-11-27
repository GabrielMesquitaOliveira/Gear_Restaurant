<?php

namespace Database\Factories;

use App\Models\Atendimento;
use App\Models\Cliente;
use App\Models\Mesa;
use App\Models\Pedido;
use Illuminate\Database\Eloquent\Factories\Factory;

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
        // Criação dos registros de Atendimento e Mesa com a possibilidade de ser null
        $atendimento = $this->faker->randomElement([Atendimento::factory()->create(), null]);
        $mesa = $this->faker->randomElement([Mesa::factory()->create(), null]);
        $cliente = $this->faker->randomElement([Cliente::factory()->create(), null]);

        return [
            'status' => $this->faker->randomElement(["Aguardando", "Processando", "Concluido", "Cancelado"]),
            'status_pagamento' => $this->faker->randomElement(["Pendente", "Pago", "Cancelado"]),
            'valor' => $this->faker->randomFloat(2, 0, 9999.99),
            'atendimento_id' => optional($atendimento)->id,  // Se $atendimento não for null, pega o ID
            'mesa_id' => optional($mesa)->id,  // Se $mesa não for null, pega o ID
            'cliente_id' => optional($cliente)->id,  // Se $cliente não for null, pega o ID
        ];
    }
}

