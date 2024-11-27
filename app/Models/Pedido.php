<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property int $id
 * @property string $status
 * @property string $status_pagamento
 * @property string $forma_pagamento
 * @property int $mesa_id
 * @property int $cliente_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 */
class Pedido extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'status',
        'status_pagamento',
        'forma_pagamento',
        'mesa_id',
        'cliente_id',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'mesa_id' => 'integer',
        'cliente_id' => 'integer',
    ];

    public function cliente(): BelongsTo
    {
        return $this->belongsTo(Cliente::class);
    }

    public function mesa(): BelongsTo
    {
        return $this->belongsTo(Mesa::class);
    }

    public function itemPedidos(): HasMany
    {
        return $this->hasMany(ItemPedido::class);
    }

    public function atendimentos(): HasMany
    {
        return $this->hasMany(Atendimento::class);
    }
}
