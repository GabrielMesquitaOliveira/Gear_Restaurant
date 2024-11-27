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
            'numero' => $this->faker->unique()->numberBetween(1, 50),
            'capacidade' => $this->faker->numberBetween(1, 10),
            'ocupada' => $this->faker->boolean(),
        ];
    }
}
