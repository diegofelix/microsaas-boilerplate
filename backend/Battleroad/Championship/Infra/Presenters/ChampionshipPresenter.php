<?php

namespace Battleroad\Championship\Infra\Presenters;

use Battleroad\Championship\Infra\Models\Championship as ChampionshipModel;

class ChampionshipPresenter
{
    public function __construct(
        private readonly CompetitionPresenter $competition,
    ) {
    }

    public function single(ChampionshipModel $championship): array
    {
        return [
            'id' => $championship->id,
            'title' => $championship->title,
            'description' => $championship->description,
            'location' => $championship->location,
            'start_at' => $championship->start_at->format('Y-m-d H:i:s'),
            'end_at' => $championship->end_at->format('Y-m-d H:i:s'),
            'picture' => $championship->picture,
            'competitions' => $this->competition->many($championship->competitions),
        ];
    }
}
