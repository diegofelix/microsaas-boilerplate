<?php

namespace Battleroad\Championship\Infra\Database\Factories;

use Battleroad\Championship\Infra\Models\Championship as ChampionshipModel;
use Illuminate\Database\Eloquent\Factories\Factory;

class ChampionshipFactory extends Factory
{
    protected $model = ChampionshipModel::class;

    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence,
            'description' => $this->faker->sentence,
            'location' => $this->faker->country,
            'start_at' => $this->faker->dateTime,
            'picture' => $this->faker->imageUrl,
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
