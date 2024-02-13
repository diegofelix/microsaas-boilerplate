<?php

namespace Battleroad\Championship\Infra\Database\Factories;

use Battleroad\Championship\Infra\Models\Game as GameModel;
use Illuminate\Database\Eloquent\Factories\Factory;

class GameFactory extends Factory
{
    protected $model = GameModel::class;

    public function definition(): array
    {
        return [
            'title' => $this->faker->company,
        ];
    }
}
