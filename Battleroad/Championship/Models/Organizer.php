<?php

namespace Battleroad\Championship\Models;

class Organizer
{
    public function __construct(
        public readonly int $id,
        public readonly string $name,
        public readonly string $email,
        public readonly string $phone,
        public readonly string $fiscalId,
        public readonly Address $address,
    ) {}
}