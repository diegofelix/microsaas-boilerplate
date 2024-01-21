<?php

namespace Battleroad\Championship\DTOs;

use DateTime;

readonly class ChampionshipRequest
{
    public function __construct(
        public int $ownerId,
        public string $title,
        public string $description,
        public string $location,
        public DateTime $eventStart,
        public string $picture,
    ) {}
}
