<?php

namespace Battleroad\Championship\DTOs;

use DateTime;

class ChampionshipRequest
{
    public function __construct(
        public readonly int $ownerId,
        public readonly string $title,
        public readonly string $description,
        public readonly string $location,
        public readonly DateTime $eventStart,
        public readonly string $picture,
    ) {}
}
