<?php

namespace Battleroad\Championship;

use Battleroad\Championship\Models\Championship;

class Repository
{
    public function createFromArray(array $data): Championship
    {
        return $this->getModel()->create($data);
    }

    private function getModel(): Championship
    {
        return new Championship();
    }
}
