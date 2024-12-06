<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PedidoResource\Pages;
use App\Filament\Resources\PedidoResource\RelationManagers;
use App\Models\Pedido;
use Filament\Forms;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Section;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PedidoResource extends Resource
{
    protected static ?string $model = Pedido::class;

    protected static ?string $navigationIcon = 'heroicon-m-shopping-bag';

    protected static ?string $navigationGroup = 'Gestão de Operações';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                // Seção de Status
                Section::make('Status do Pedido')
                    ->description('Gerencie o status do pedido e do pagamento.')
                    ->schema([
                        Grid::make(2)
                            ->schema([
                                Forms\Components\Select::make('status')
                                    ->label('Status do Pedido')
                                    ->options([
                                        'Aguardando' => 'Aguardando',
                                        'Processando' => 'Processando',
                                        'Concluido' => 'Concluído',
                                        'Cancelado' => 'Cancelado',
                                    ])
                                    ->placeholder('Selecione o status do pedido')
                                    ->required(),

                                Forms\Components\Select::make('status_pagamento')
                                    ->label('Status do Pagamento')
                                    ->options([
                                        'Pendente' => 'Pendente',
                                        'Pago' => 'Pago',
                                        'Cancelado' => 'Cancelado',
                                    ])
                                    ->placeholder('Selecione o status do pagamento')
                                    ->required(),
                            ]),

                        Forms\Components\Select::make('forma_pagamento')
                            ->label('Forma de Pagamento')
                            ->options([
                                'Cartao' => 'Cartão',
                                'Dinheiro' => 'Dinheiro',
                                'Pix' => 'Pix',
                            ])
                            ->placeholder('Selecione a forma de pagamento')
                            ->columnSpanFull()
                            ->required(),
                    ]),

                // Seção de Associação
                Section::make('Associação com Mesa e Cliente')
                    ->description('Associe o pedido a uma mesa e um cliente registrados.')
                    ->schema([
                        Grid::make(2)
                            ->schema([
                                Forms\Components\Select::make('mesa_id')
                                    ->label('Mesa')
                                    ->relationship('mesa', 'id')
                                    ->placeholder('Selecione uma mesa')
                                    ->default(null),

                                Forms\Components\Select::make('cliente_id')
                                    ->label('Cliente')
                                    ->relationship('cliente.user', 'name')
                                    ->searchable()
                                    ->placeholder('Selecione um cliente')
                                    ->default(null),
                            ]),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id')
                    ->sortable()
                    ->numeric(),
                Tables\Columns\TextColumn::make('status')
                    ->badge()
                    ->colors([
                        'warning' => 'Aguardando',  // Cor para o status "pendente"
                        'success' => 'Concluido',     // Cor para o status "ativo"
                        'danger'  => 'Cancelado',   // Cor para o status "inativo"
                    ])
                    ->icon(function ($record){
                        switch ($record->status) {
                            case 'Aguardando':
                                return 'heroicon-o-arrow-path';
                            case 'Concluido':
                                return 'heroicon-c-check-circle';
                            case 'Cancelado':
                                return 'heroicon-c-x-circle';
                        }
                    }),
                Tables\Columns\TextColumn::make('status_pagamento')
                    ->badge()
                    ->colors([
                        'warning' => 'Pendente',    // Cor para o status "Pendente"
                        'success' => 'Pago',        // Cor para o status "Pago"
                        'danger'  => 'Cancelado',   // Cor para o status "Cancelado"
                    ])
                    ->icon(function ($record){
                        switch ($record->status_pagamento){
                            case 'Pendente':
                                return 'heroicon-o-arrow-path';
                            case 'Pago':
                                return 'heroicon-c-check-circle';
                            case 'Cancelado':
                                return 'heroicon-c-x-circle';
                        }
                    }),
                Tables\Columns\TextColumn::make('forma_pagamento')
                    ->badge()
                    ->colors([
                        'warning' => 'Cartao',      // Cor para o status "Cartão"
                        'success' => 'Dinheiro',  // Cor para o status "Dinheiro"
                        'info' => 'Pix',            // Cor para o status "Pix"
                    ])
                    ->icon(function ($record) {
                        // Defina o ícone com base no valor de forma_pagamento
                        switch ($record->forma_pagamento) {
                            case 'Cartao':
                                return 'gmdi-credit-card-o'; // Ícone para Cartão
                            case 'Dinheiro':
                                return 'gmdi-monetization-on-r'; // Ícone para Dinheiro
                            case 'Pix':
                                return 'gmdi-pix-o'; // Ícone para Pix
                            default:
                                return 'gmdi-pix-o'; // Ícone default
                        }
                    }),
                Tables\Columns\TextColumn::make('mesa.id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('cliente.user.name')
                    ->label('Cliente')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Data e Hora do Pedido')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPedidos::route('/'),
            'create' => Pages\CreatePedido::route('/create'),
            'edit' => Pages\EditPedido::route('/{record}/edit'),
        ];
    }
}
