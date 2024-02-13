<?php

namespace Battleroad\Championship\DTOs;

use Battleroad\Championship\Infra\Models\Championship;
use DateTime;

readonly class AddCompetitionRequest
{
    public function __construct(
        public Championship $championship,
        public string $gameId,
        public string $platformId,
        public DateTime $startAt,
    ) {
    }
}
