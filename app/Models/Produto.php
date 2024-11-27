<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property int $id
 * @property string $imagem
 * @property string $nome
 * @property float $preco
 * @property string $descricao
 * @property bool $disponivel
 * @property int $quantidade_estoque
 * @property int $categoria_produto_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 */
class Produto extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'imagem',
        'nome',
        'preco',
        'descricao',
        'disponivel',
        'quantidade_estoque',
        'categoria_produto_id',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'preco' => 'decimal:2',
        'disponivel' => 'boolean',
        'categoria_produto_id' => 'integer',
    ];

    public function categoriaProduto(): BelongsTo
    {
        return $this->belongsTo(CategoriaProduto::class);
    }

    public function itemPedidos(): HasMany
    {
        return $this->hasMany(ItemPedido::class);
    }
}
