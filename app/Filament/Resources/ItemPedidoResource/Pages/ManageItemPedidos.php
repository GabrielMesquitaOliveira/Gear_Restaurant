<?php

namespace App\Filament\Resources\ItemPedidoResource\Pages;

use App\Filament\Resources\ItemPedidoResource;
use Filament\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageItemPedidos extends ManageRecords
{
    protected static string $resource = ItemPedidoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
