<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Cliente;
use App\Models\Mesa;
use App\Models\Reserva;

class ReservaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Reserva::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'data_hora' => $this->faker->dateTime(),
            'status' => $this->faker->randomElement(["Pendente","Confirmada","Cancelada","Finalizada"]),
            'mesa_id' => Mesa::inRandomOrder()->first()->id,
            'cliente_id' => Cliente::inRandomOrder()->first()->id,
        ];
    }
}
