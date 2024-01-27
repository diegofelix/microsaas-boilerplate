<?php

namespace Battleroad\Championship\Infra\Database\Factories;

use Battleroad\Championship\Infra\Models\Platform as PlatformModel;
use Illuminate\Database\Eloquent\Factories\Factory;

class Platform extends Factory
{
    protected $model = PlatformModel::class;

    public function definition(): array
    {
        return [
            'title' => $this->faker->company,
        ];
    }
}
