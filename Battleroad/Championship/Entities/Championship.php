<?php

namespace Battleroad\Championship\Entities;

use DateTime;

class Championship
{
    public function __construct(
        public readonly int $id,
        public readonly int $ownerId,
        public readonly string $title,
        public readonly string $description,
        public readonly string $location,
        public readonly DateTime $startAt,
        public readonly string $picture,
        public readonly DateTime $createdAt,
        public readonly DateTime $updatedAt,
    ) {}

    public function toArray(): array
    {
        return [
            'id' => $this->id,
            'ownerId' => $this->ownerId,
            'title' => $this->title,
            'description' => $this->description,
            'location' => $this->location,
            'startAt' => $this->startAt->format('Y-m-d H:i:s'),
            'picture' => $this->picture,
            'createdAt' => $this->createdAt,
            'updatedAt' => $this->updatedAt,
        ];
    }
}
