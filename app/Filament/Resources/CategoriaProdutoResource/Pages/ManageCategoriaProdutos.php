<?php

namespace App\Filament\Resources\CategoriaProdutoResource\Pages;

use App\Filament\Resources\CategoriaProdutoResource;
use Filament\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageCategoriaProdutos extends ManageRecords
{
    protected static string $resource = CategoriaProdutoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
