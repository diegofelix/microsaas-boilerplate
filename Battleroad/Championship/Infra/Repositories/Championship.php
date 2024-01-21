<?php

namespace Battleroad\Championship\Infra\Repositories;

use Battleroad\Championship\DTOs\ChampionshipRequest;
use Battleroad\Championship\Entities\Championship as Entity;
use Battleroad\Championship\Infra\Models\Championship as Model;

class Championship
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

    private function getModel(): Model
    {
        return new Model();
    }

    private function entityFromModel(Model $model): Entity
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
