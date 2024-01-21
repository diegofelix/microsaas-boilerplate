<?php

namespace Battleroad\Championship\Models;

use Battleroad\Championship\Infraestructure\Http\Requests\RegisterNewChampionship;
use Illuminate\Database\Eloquent\Model;

class Championship extends Model
{
    /**
     * As we have total control over what we are inputting to this method
     * We can avoid guard fields.
     *
     * @var array
     */
    protected $guarded = [];
}
