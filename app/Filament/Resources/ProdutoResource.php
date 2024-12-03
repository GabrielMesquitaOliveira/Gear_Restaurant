<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProdutoResource\Pages;
use App\Filament\Resources\ProdutoResource\RelationManagers;
use App\Models\Produto;
use Awcodes\Curator\Components\Forms\CuratorPicker;
use Awcodes\Curator\Components\Tables\CuratorColumn;
use Filament\Forms;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Section;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ProdutoResource extends Resource
{
    protected static ?string $model = Produto::class;

    protected static ?string $navigationIcon = 'mdi-food';

    protected static ?string $navigationGroup = 'Gestão de Produtos';

    protected static ?int $navigationSort = 1;


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                // Seção de Imagens do Produto
                Section::make('Imagens do Produto')
                    ->description('Adicione uma ou mais imagens representativas para o produto.')
                    ->schema([
                        CuratorPicker::make('product_picture_ids')
                            ->multiple()
                            ->relationship('productPictures', 'id')
                            ->label('Imagens do Produto'),
                    ])
                    ->collapsible()
                    ->collapsed(true),

                // Seção de Informações Básicas
                Section::make('Informações Básicas')
                    ->description('Preencha os detalhes básicos do produto.')
                    ->schema([
                        Grid::make(2)
                            ->schema([
                                Forms\Components\TextInput::make('nome')
                                    ->label('Nome do Produto')
                                    ->placeholder('Ex.: Café Torrado 500g')
                                    ->required()
                                    ->maxLength(100),
                                Forms\Components\TextInput::make('preco')
                                    ->label('Preço')
                                    ->placeholder('Ex.: 29.90')
                                    ->prefix('R$')
                                    ->required()
                                    ->numeric(),
                            ]),

                        Forms\Components\Textarea::make('descricao')
                            ->label('Descrição do Produto')
                            ->placeholder('Descreva o produto, suas características e benefícios.')
                            ->columnSpanFull(),
                    ]),

                // Seção de Estoque e Disponibilidade
                Section::make('Estoque e Disponibilidade')
                    ->description('Gerencie a disponibilidade e estoque do produto.')
                    ->schema([
                        Grid::make(2)
                            ->schema([
                                Forms\Components\Toggle::make('disponivel')
                                    ->label('Disponível para venda')
                                    ->default(true)
                                    ->required(),
                                Forms\Components\TextInput::make('quantidade_estoque')
                                    ->label('Quantidade em Estoque')
                                    ->placeholder('Ex.: 50')
                                    ->numeric()
                                    ->default(0)
                                    ->required(),
                            ]),
                    ]),

                // Seção de Categoria
                Section::make('Categoria')
                    ->description('Selecione a categoria a qual este produto pertence.')
                    ->schema([
                        Forms\Components\Select::make('categoria_produto_id')
                            ->label('Categoria do Produto')
                            ->relationship('categoriaProduto', 'nome') // Use 'nome' ou o campo que representa o título da categoria
                            ->placeholder('Selecione uma categoria')
                            ->required(),
                    ]),
            ]);
    }


    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                CuratorColumn::make('productPictures')
                    ->label('Imagens')
                    ->ring(2) // options 0,1,2,4
                    ->overlap(4) // options 0,2,3,4
                    ->height(80)
                    ->circular()
                    ->limit(4),
                Tables\Columns\TextColumn::make('nome')
                    ->searchable(),
                Tables\Columns\TextColumn::make('preco')
                    ->numeric()
                    ->prefix('R$ ')
                    ->sortable(),
                Tables\Columns\IconColumn::make('disponivel')
                    ->boolean(),
                Tables\Columns\TextColumn::make('quantidade_estoque')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('categoriaProduto.nome')
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

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }
}
