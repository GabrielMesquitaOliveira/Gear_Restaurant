<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(10)->create();

        $this->command->info('Iniciando o seeding dos dados...');

        $this->call([
            CargoSeeder::class,
            CategoriaProdutoSeeder::class,
            ClienteSeeder::class,
            EnderecoSeeder::class,
            FuncionarioSeeder::class,
            MesaSeeder::class,
            ProdutoSeeder::class,
            PedidoSeeder::class,
            AtendimentoSeeder::class,
            ItemPedidoSeeder::class,
            ReservaSeeder::class,
        ]);

        $this->command->info('Seeding concluído com sucesso!');

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
