<?php

namespace Battleroad\Championship;

use Battleroad\Championship\Models\Championship;
use DateTime;

class Repository
{
    public function create(
        int $ownerId,
        string $title,
        string $description,
        string $location,
        DateTime $eventStart,
        string $picture
    ): Championship
    {
        return $this->getModel()->create([
            'owner_id' => $ownerId,
            'title' => $title,
            'description' => $description,
            'location' => $location,
            'event_start' => $eventStart,
            'picture' => $picture
        ]);
    }

    private function getModel(): Championship
    {
        return new Championship();
    }
}
