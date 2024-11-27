<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Cargo;
use App\Models\Funcionario;
use App\Models\User;

class FuncionarioFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Funcionario::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'cargo_id' => Cargo::inRandomOrder()->first()->id,
            'user_id' => User::factory(),
        ];
    }
}
