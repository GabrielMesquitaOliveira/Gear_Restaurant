<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Cliente;
use App\Models\Endereco;

class EnderecoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Endereco::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'rua' => $this->faker->word(),
            'numero' => $this->faker->regexify('[A-Za-z0-9]{10}'),
            'bairro' => $this->faker->regexify('[A-Za-z0-9]{100}'),
            'cidade' => $this->faker->regexify('[A-Za-z0-9]{100}'),
            'estado' => $this->faker->randomLetter(),
            'cep' => $this->faker->regexify('[A-Za-z0-9]{10}'),
            'complemento' => $this->faker->word(),
            'cliente_id' => Cliente::factory(),
        ];
    }
}
