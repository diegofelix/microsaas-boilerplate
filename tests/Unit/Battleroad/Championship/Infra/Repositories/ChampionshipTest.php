<?php

namespace Tests\Unit\Battleroad\Championship\Infra\Repositories;

use Battleroad\Championship\DTOs\ChampionshipRequest;
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
            'owner_id' => 'someOwnerId123',
            'title' => fake()->title,
            'description' => fake()->sentence,
            'location' => fake()->country,
            'start_at' => fake()->dateTime,
            'picture' => fake()->imageUrl,
        ];

        $newModel = ChampionshipFactory::new()->make(array_merge(
            ['id' => 'someChampionshipId123'],
            $requestData
        ));

        // Expectations
        $model->expects()
            ->create($requestData)
            ->andReturn($newModel);

        // Actions
        $repository = new Repository($model);
        $championshipRequest = new ChampionshipRequest(...array_values($requestData));
        $model = $repository->create($championshipRequest);
        // Assertions
        $this->assertInstanceOf(Model::class, $model);
        $this->assertSame($model->title, $requestData['title']);
        $this->assertSame($model->owner_id, $requestData['owner_id']);
    }
}
