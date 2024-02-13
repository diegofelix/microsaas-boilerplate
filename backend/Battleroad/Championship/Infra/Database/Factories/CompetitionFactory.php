<?php

namespace Battleroad\Championship\Infra\Database\Factories;

use Battleroad\Championship\Infra\Models\Competition as CompetitionModel;
use Illuminate\Database\Eloquent\Factories\Factory;

class CompetitionFactory extends Factory
{
    protected $model = CompetitionModel::class;

    public function definition(): array
    {
        return [
            'game_id' => $this->faker->uuid,
            'platform_id' => $this->faker->uuid,
            'start_at' => $this->faker->dateTime,
        ];
    }
}
