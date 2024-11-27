<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Mesa;

class MesaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Mesa::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'numero' => $this->faker->numberBetween(-10000, 10000),
            'capacidade' => $this->faker->numberBetween(-10000, 10000),
            'ocupada' => $this->faker->boolean(),
        ];
    }
}
