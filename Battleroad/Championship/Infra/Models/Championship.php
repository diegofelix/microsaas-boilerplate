<?php

namespace Battleroad\Championship\Infra\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use MongoDB\Laravel\Eloquent\Model;
use MongoDB\Laravel\Relations\EmbedsMany;

class Championship extends Model
{
    /**
     * Cast dates from UTCDateTime to DateTime and vice-versa.
     *
     * @var string[]
     */
    protected $casts = ['start_at' => 'datetime'];

    /**
     * As we have total control over what we are inputting to this method
     * We can avoid guard fields.
     *
     * @var array
     */
    protected $guarded = [];

    public function owner(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function competitions(): EmbedsMany
    {
        return $this->embedsMany(Competition::class);
    }
}
