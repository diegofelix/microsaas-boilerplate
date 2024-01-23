<?php

use Battleroad\Championship\DTOs\ChampionshipRequest;
use Battleroad\Championship\Entities\Championship as Entity;
use Battleroad\Championship\Infra\Database\Factories\Championship as ChampionshipFactory;
use Battleroad\Championship\Infra\Models\Championship as Model;
use Battleroad\Championship\Infra\Repositories\Championship as Repository;

// Necessary to use factories
uses(Tests\TestCase::class);

it('creates a new championship', function () {
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

    // Expectations
    expect($entity)->toBeInstanceOf(Entity::class);
    expect($entity)->toHaveProperty('title', $requestData['title']);
    expect($entity)->toHaveProperty('ownerId', $requestData['owner_id']);
});
