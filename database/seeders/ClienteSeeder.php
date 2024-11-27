<?php

namespace Database\Seeders;

use App\Models\Cliente;
use App\Models\Endereco;
use Illuminate\Database\Seeder;

class ClienteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Cliente::factory()->count(5)->create()->each(
            function (Cliente $cliente) {
                Endereco::factory()->create([
                    'cliente_id' => $cliente->id
                ]);
            }
        );
    }
}
