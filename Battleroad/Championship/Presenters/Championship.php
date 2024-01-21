<?php

namespace Battleroad\Championship\Presenters;

use Battleroad\Championship\Entities\Championship as Entity;

class Championship
{
    public function present(Entity $championship): array
    {
        return $championship->toArray();
    }
}
