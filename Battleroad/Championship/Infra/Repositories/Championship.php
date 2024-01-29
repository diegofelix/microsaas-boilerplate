<?php

namespace Battleroad\Championship\Infra\Repositories;

use Battleroad\Championship\DTOs\AddCompetitionRequest;
use Battleroad\Championship\DTOs\ChampionshipRequest;
use Battleroad\Championship\Infra\Models\Championship as Model;

class Championship
{
    public function __construct(private readonly Model $model)
    {
    }

    public function create(ChampionshipRequest $championshipRequest): Model
    {
        return $this->model->create([
            'owner_id' => $championshipRequest->ownerId,
            'title' => $championshipRequest->title,
            'description' => $championshipRequest->description,
            'location' => $championshipRequest->location,
            'start_at' => $championshipRequest->startAt,
            'picture' => $championshipRequest->picture,
        ]);
    }

    public function addCompetition(AddCompetitionRequest $request): Model
    {
        $championship = $request->championship;
        $championship->competitions()->create([
            'game_id' => $request->gameId,
            'platform_id' => $request->platformId,
            'start_at' => $request->startAt,
        ]);

        return $championship;
    }
}
