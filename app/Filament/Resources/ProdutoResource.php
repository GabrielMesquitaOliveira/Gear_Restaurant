<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProdutoResource\Pages;
use App\Filament\Resources\ProdutoResource\RelationManagers;
use App\Models\Produto;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ProdutoResource extends Resource
{
    protected static ?string $model = Produto::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('imagem')
                    ->maxLength(255)
                    ->default(null),
                Forms\Components\TextInput::make('nome')
                    ->required()
                    ->maxLength(100),
                Forms\Components\TextInput::make('preco')
                    ->required()
                    ->numeric(),
                Forms\Components\Textarea::make('descricao')
                    ->columnSpanFull(),
                Forms\Components\Toggle::make('disponivel')
                    ->required(),
                Forms\Components\TextInput::make('quantidade_estoque')
                    ->required()
                    ->numeric()
                    ->default(0),
                Forms\Components\Select::make('categoria_produto_id')
                    ->relationship('categoriaProduto', 'id')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('imagem')
                    ->searchable(),
                Tables\Columns\TextColumn::make('nome')
                    ->searchable(),
                Tables\Columns\TextColumn::make('preco')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\IconColumn::make('disponivel')
                    ->boolean(),
                Tables\Columns\TextColumn::make('quantidade_estoque')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('categoriaProduto.id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
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
            'index' => Pages\ListProdutos::route('/'),
            'create' => Pages\CreateProduto::route('/create'),
            'edit' => Pages\EditProduto::route('/{record}/edit'),
        ];
    }
}