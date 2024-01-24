<?php

namespace Tests\Unit\Battleroad\Championship\Infra\Repositories;

use Battleroad\Championship\DTOs\ChampionshipRequest;
use Battleroad\Championship\Entities\Championship as Entity;
use Battleroad\Championship\Infra\Database\Factories\Championship as ChampionshipFactory;
use Battleroad\Championship\Infra\Models\Championship as Model;
use Battleroad\Championship\Infra\Repositories\Championship as Repository;
use Mockery;
use Tests\TestCase;

class ChampionshipTest extends TestCase
{
    public function test_it_creates_a_new_championship(): void
    {
        // Set
        $model = Mockery::mock(Model::class);

        $requestData = [
            'owner_id' => 1,
            'title' => fake()->title,
            'description' => fake()->sentence,
            'location' => fake()->country,
            'start_at' => fake()->dateTime,
            'picture' => fake()->imageUrl,
        ];

        $newModel = ChampionshipFactory::new()->make(array_merge(
            ['id' => 1],
            $requestData
        ));

        // Expectations
        $model->expects()
            ->create($requestData)
            ->andReturn($newModel);

        // Actions
        $repository = new Repository($model);
        $championshipRequest = new ChampionshipRequest(... array_values($requestData));
        $entity = $repository->create($championshipRequest);

        // Assertions
        $this->assertInstanceOf(Entity::class, $entity);
        $this->assertObjectHasProperty('title', $entity);
        $this->assertObjectHasProperty('ownerId', $entity);
    }
}
