<?php

namespace Battleroad\Championship;

use Battleroad\Championship\DTOs\ChampionshipRequest;
use Battleroad\Championship\Entities\Championship as Entity;
use Battleroad\Championship\Models\Championship;
use DateTime;

class Repository
{
    public function create(ChampionshipRequest $championshipRequest): Entity
    {
        $model = $this->getModel()->create([
            'owner_id' => $championshipRequest->ownerId,
            'title' => $championshipRequest->title,
            'description' => $championshipRequest->description,
            'location' => $championshipRequest->location,
            'event_start' => $championshipRequest->eventStart,
            'picture' => $championshipRequest->picture
        ]);

        return $this->entityFromModel($model);
    }

    private function getModel(): Championship
    {
        return new Championship();
    }

    private function entityFromModel(Championship $model): Entity
    {
        return new Entity(
            $model->id,
            $model->owner_id,
            $model->title,
            $model->description,
            $model->location,
            $model->eventStart,
            $model->picture,
            $model->created_at,
            $model->updated_at,
        );
    }
}
