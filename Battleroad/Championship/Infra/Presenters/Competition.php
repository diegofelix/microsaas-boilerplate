<?php

namespace Battleroad\Championship\Infra\Presenters;

use Battleroad\Championship\Infra\Models\Competition as CompetitionModel;
use Illuminate\Database\Eloquent\Collection;

class Competition
{
    public function single(CompetitionModel $competition): array
    {
        return [
            'game' => $competition->game->title,
            'platform' => $competition->platform->title,
            'startAt' => $competition->start_at->format('Y-m-d H:i:s'),
        ];
    }

    public function many(Collection $competitions): array
    {
        return $competitions->map(function (CompetitionModel $competition) {
            return $this->single($competition);
        })->toArray();
    }
}
