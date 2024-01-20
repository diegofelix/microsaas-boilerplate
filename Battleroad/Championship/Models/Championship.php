<?php

namespace Battleroad\Championship\Models;

use Battleroad\Championship\Infraestructure\Http\Requests\RegisterNewChampionship;
use Illuminate\Database\Eloquent\Model;

class Championship extends Model
{
    public static function fromRequest(RegisterNewChampionship $request): self
    {
        return new self([
            'userId' => $request->user()->id,
            'name' => $request->name,
            'description' => $request->description,
            'location' => $request->location,
            'eventStart' => $request->eventStart,
            'image' => $request->image,
        ]);
    }
}
