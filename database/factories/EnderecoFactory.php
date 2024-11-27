<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Cliente;

class EnderecoFactory extends Factory
{
    /**
     * Define o modelo correspondente.
     *
     * @var string
     */
    protected $model = \App\Models\Endereco::class;

    /**
     * Define o estado padrão do modelo.
     */
    public function definition(): array
    {
        return [
            'rua' => $this->faker->streetName(), // Nome de rua realista
            'numero' => $this->faker->buildingNumber(), // Número de edifício realista
            'bairro' => $this->faker->citySuffix(), // Sufixo da cidade como bairro
            'cidade' => $this->faker->city(), // Nome da cidade realista
            'estado' => $this->faker->stateAbbr(), // Abreviação do estado (Ex.: SP, RJ)
            'cep' => $this->faker->postcode(), // Código postal realista
            'complemento' => $this->faker->optional()->secondaryAddress(), // Complemento opcional
            'cliente_id' => Cliente::factory(), // Relacionamento com cliente
        ];
    }
}
