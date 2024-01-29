<?php

namespace Battleroad\Championship\DTOs;

use DateTime;

readonly class ChampionshipRequest
{
    public function __construct(
        public string $ownerId,
        public string $title,
        public string $description,
        public string $location,
        public DateTime $startAt,
        public string $picture,
    ) {
    }
}
