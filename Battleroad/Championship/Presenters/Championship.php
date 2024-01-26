<?php

namespace Battleroad\Championship\Presenters;

use Battleroad\Championship\Infra\Models\Championship as Model;

class Championship
{
    public function present(Model $model): array
    {
        return [
            'id' => $model->id,
            'title' => $model->title,
            'description' => $model->description,
            'location' => $model->location,
            'startAt' => $model->start_at->format('Y-m-d H:i:s'),
            'picture' => $model->picture,
        ];
    }
}
