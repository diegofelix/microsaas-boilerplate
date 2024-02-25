<?php

namespace Battleroad\Championship\Infra\Repositories;

use Battleroad\Championship\Infra\Http\Requests\AddCompetition;
use Battleroad\Championship\Infra\Http\Requests\RegisterNewChampionship;
use Battleroad\Championship\Infra\Models\Championship;
use Battleroad\Championship\Infra\Models\Championship as Model;

class ChampionshipRepository
{
    public function __construct(
        private readonly Model $model,
    ) {
    }

    public function create(RegisterNewChampionship $request): Model
    {
        return $this->model->create([
            'owner_id' => $request->get('ownerId'),
            'title' => $request->get('title'),
            'description' => $request->get('description'),
            'location' => $request->get('location'),
            'start_at' => $request->get('startAt'),
            'picture' => $request->get('picture'),
        ]);
    }

    public function addCompetition(Championship $championship, AddCompetition $request): Model
    {
        $championship->competitions()->create([
            'game_id' => $request->get('gameId'),
            'platform_id' => $request->get('platformId'),
            'start_at' => $request->get('startAt'),
        ]);

        return $championship;
    }
}
