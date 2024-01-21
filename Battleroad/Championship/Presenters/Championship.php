<?php

namespace Battleroad\Championship\Presenters;

use Battleroad\Championship\Entities\Championship as Entity;

class Championship
{
    public function present(Entity $entity): array
    {
        return [
            'id' => $entity->id,
            'title' => $entity->title,
            'description' => $entity->description,
            'location' => $entity->location,
            'startAt' => $entity->startAt->format('Y-m-d H:i:s'),
            'picture' => $entity->picture,
        ];
    }
}
