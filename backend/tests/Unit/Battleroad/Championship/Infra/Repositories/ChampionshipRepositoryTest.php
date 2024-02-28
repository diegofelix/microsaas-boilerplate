<?php

namespace Tests\Unit\Battleroad\Championship\Infra\Repositories;

use Battleroad\Account\Infra\Models\User;
use Battleroad\Championship\Infra\Database\Factories\ChampionshipFactory;
use Battleroad\Championship\Infra\Http\Requests\RegisterNewChampionship;
use Battleroad\Championship\Infra\Models\Championship as Model;
use Battleroad\Championship\Infra\Repositories\ChampionshipRepository;
use Mockery;
use Tests\TestCase;

class ChampionshipRepositoryTest extends TestCase
{
    public function test_it_creates_a_new_championship(): void
    {
        // Set
        $model = Mockery::mock(Model::class);
        $user = Mockery::mock(User::class);
        $requestData = [
            'owner_id' => 'someOwnerId123',
            'title' => fake()->title,
            'start_at' => fake()->dateTime,
            'end_at' => fake()->dateTime,
        ];

        $request = Mockery::mock(RegisterNewChampionship::class);

        $newModel = ChampionshipFactory::new()->make(array_merge(
            ['id' => 'someChampionshipId123'],
            $requestData
        ));

        // Expectations
        $model->expects()
            ->create($requestData)
            ->andReturn($newModel);

        $request->expects()
            ->user()
            ->andReturn($user);

        $user->expects()
            ->getAttribute('_id')
            ->andReturn('someOwnerId123');

        $request->expects()
            ->get('title')
            ->andReturn($requestData['title']);

        $request->expects()
            ->get('start_at')
            ->andReturn($requestData['start_at']);

        $request->expects()
            ->get('end_at')
            ->andReturn($requestData['end_at']);

        // Actions
        $repository = new ChampionshipRepository($model);
        $model = $repository->create($request);

        // Assertions
        $this->assertInstanceOf(Model::class, $model);
        $this->assertSame($model->title, $requestData['title']);
        $this->assertSame($model->owner_id, $requestData['owner_id']);
    }
}
