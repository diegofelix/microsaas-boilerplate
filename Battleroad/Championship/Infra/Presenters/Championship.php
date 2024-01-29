<?php

namespace Battleroad\Championship\Infra\Presenters;

use Battleroad\Championship\Infra\Models\Championship as ChampionshipModel;
use Battleroad\Championship\Infra\Presenters\Competition as CompetitionPresenter;

class Championship
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
            'startAt' => $championship->start_at->format('Y-m-d H:i:s'),
            'picture' => $championship->picture,
            'competitions' => $this->competition->many($championship->competitions),
        ];
    }
}
