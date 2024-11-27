<?php

namespace Database\Factories;

use geekcom\ValidatorDocs\Rules\Cpf;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * The current password being used by the factory.
     */
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'cpf' => $this->generateCPF(),
            'email_verified_at' => now(),
            'password' => static::$password ??= Hash::make('password'),
            'remember_token' => Str::random(10),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn(array $attributes) => [
            'email_verified_at' => null,
        ]);
    }

    /**
     * Gera um CPF válido.
     */
    private function generateCPF(): string
    {
        $cpf = [];

        // Gera os 9 primeiros dígitos
        for ($i = 0; $i < 9; $i++) {
            $cpf[] = rand(0, 9);
        }

        // Calcula o primeiro dígito verificador
        $cpf[] = $this->calculateCheckDigit($cpf, 10);

        // Calcula o segundo dígito verificador
        $cpf[] = $this->calculateCheckDigit($cpf, 11);

        // Retorna o CPF formatado
        return implode('', $cpf); // Sem pontuação
    }

    /**
     * Calcula o dígito verificador.
     */
    private function calculateCheckDigit(array $cpf, int $factor): int
    {
        $sum = 0;

        foreach ($cpf as $digit) {
            $sum += $digit * $factor--;
        }

        $remainder = $sum % 11;

        return $remainder < 2 ? 0 : 11 - $remainder;
    }
}
