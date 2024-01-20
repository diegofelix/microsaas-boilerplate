<?php

namespace Battleroad\Championship\Models;

class Address
{
    public function __construct(
        public readonly string $zipCode,
        public readonly string $state,
        public readonly string $city,
        public readonly string $neighborhood,
        public readonly string $street,
        public readonly string $number,
        public readonly string $complement = '',
    ) {}
}