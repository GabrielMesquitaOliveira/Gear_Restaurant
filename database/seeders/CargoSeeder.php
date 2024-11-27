<?php

namespace Database\Seeders;

use App\Models\Cargo;
use Illuminate\Database\Seeder;

class CargoSeeder extends Seeder
{
    public function run(): void
    {
        $cargos = [
            'Garçom',
            'Cozinheiro',
            'Caixa',
            'Gerente',
            'Ajudante de Cozinha',
            'Recepcionista',
            'Chefe de Cozinha',
            'Atendente',
        ];

        foreach ($cargos as $cargo) {
            Cargo::factory()->create(['nome' => $cargo]);
        }
    }
}
