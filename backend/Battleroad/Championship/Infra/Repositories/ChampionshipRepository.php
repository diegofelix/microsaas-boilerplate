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
            'owner_id' => $request->user()->_id,
            'title' => $request->get('title'),
            'start_at' => $request->get('start_at'),
            'end_at' => $request->get('end_at'),
        ]);
    }

    public function addCompetition(Championship $championship, AddCompetition $request): Model
    {
        $championship->competitions()->create([
            'game_id' => $request->get('game_id'),
            'platform_id' => $request->get('platform_id'),
            'start_at' => $request->get('start_at'),
            'end_at' => $request->get('end_at'),
        ]);

        return $championship;
    }
}
