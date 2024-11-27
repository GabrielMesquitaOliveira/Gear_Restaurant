<?php

namespace Database\Seeders;

use App\Models\Atendimento;
use Illuminate\Database\Seeder;

class AtendimentoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Atendimento::factory()->count(5)->create();
    }
}
