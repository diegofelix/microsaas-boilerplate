<?php

namespace Battleroad\Championship\Infra\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use MongoDB\Laravel\Eloquent\Model;

class Championship extends Model
{
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
}
