<?php

namespace Tests\Unit\Battleroad\Championship\Actions;

use Battleroad\Championship\Infra\Http\Requests\RegisterNewChampionship as Request;
use Battleroad\Championship\Infra\Models\Championship as ChampionshipModel;
use Battleroad\Championship\Infra\Repositories\ChampionshipRepository;
use Battleroad\Championship\Actions\RegisterNewChampionship;
use Mockery;
use PHPUnit\Framework\TestCase;

class RegisterNewChampionshipTest extends TestCase
{
    public function test_it_creates_a_new_championship_from_a_request(): void
    {
        // Set
        $repository = Mockery::mock(ChampionshipRepository::class);
        $action = new RegisterNewChampionship($repository);
        $model = Mockery::mock(ChampionshipModel::class);
        $request = Mockery::mock(Request::class);

        // Expectations
        $repository->expects()
            ->create($request)
            ->andReturn($model);

        // Actions
        $result = $action->execute($request);

        // Assertions
        $this->assertSame($model, $result);
    }
}
