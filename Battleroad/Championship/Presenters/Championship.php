<?php

namespace Battleroad\Championship\Presenters;

class Championship
{
    public function present(Championship $championship): array
    {
        return $championship->attributesToArray();
    }
}
