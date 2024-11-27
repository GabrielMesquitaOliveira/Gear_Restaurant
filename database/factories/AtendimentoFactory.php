<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Atendimento;
use App\Models\Funcionario;
use App\Models\Pedido;

class AtendimentoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Atendimento::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'funcionario_id' => Funcionario::factory(),
            'pedido_id' => Pedido::factory(),
        ];
    }
}
