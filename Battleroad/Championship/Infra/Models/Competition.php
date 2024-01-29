<?php

namespace Battleroad\Championship\Infra\Models;

use MongoDB\Laravel\Eloquent\Model;
use MongoDB\Laravel\Relations\BelongsTo;

class Competition extends Model
{
    /**
     * Cast dates from UTCDateTime to DateTime and vice-versa.
     *
     * @var string[]
     */
    protected $casts = ['start_at' => 'datetime'];

    protected $fillable = [
        'game_id',
        'platform_id',
        'start_at',
    ];

    public function game(): BelongsTo
    {
        return $this->belongsTo(Game::class);
    }

    public function platform(): BelongsTo
    {
        return $this->belongsTo(Platform::class);
    }
}
