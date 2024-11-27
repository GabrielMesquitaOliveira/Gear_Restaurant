<?php

namespace Database\Seeders;

use App\Models\ItemPedido;
use Illuminate\Database\Seeder;

class ItemPedidoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ItemPedido::factory()->count(5)->create();
    }
}
