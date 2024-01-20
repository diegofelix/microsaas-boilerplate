<?php

namespace Battleroad\Championship\Services;

use App\Http\Requests\RegisterNewChampionship as Request;
use Battleroad\Championship\Models\Championship;
use Battleroad\Championship\Repository;

class RegisterNewChampionship
{
    public function __construct(private readonly Repository $repository)
    {
    }

    public function createFromRequest(Request $request): Championship
    {
        return $this->repository->create(
            $request->user()->id,
            $request->get('name'),
            $request->get('description'),
            $request->get('location'),
            $request->get('eventStart'),
            $request->get('image')
        );

        // @todo Dispatch NewChampionshipWasRegistered
    }
}
