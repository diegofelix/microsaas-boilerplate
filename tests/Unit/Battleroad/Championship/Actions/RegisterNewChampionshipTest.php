<?php

namespace Tests\Unit\Battleroad\Championship\Actions;

use Battleroad\Championship\Actions\RegisterNewChampionship;
use Battleroad\Championship\DTOs\ChampionshipRequest;
use Battleroad\Championship\Entities\Championship as ChampionshipEntity;
use Battleroad\Championship\Infra\Repositories\Championship as ChampionshipRepository;
use Mockery;
use PHPUnit\Framework\TestCase;

class RegisterNewChampionshipTest extends TestCase
{
    public function test_it_creates_a_new_championship_from_a_request(): void
    {
        // Set
        $repository = Mockery::mock(ChampionshipRepository::class);
        $action = new RegisterNewChampionship($repository);
        $entity = Mockery::mock(ChampionshipEntity::class);
        $request = new ChampionshipRequest(
            1,
            'title',
            'description',
            'some location',
            new \DateTime('tomorrow'),
            'https://cdn.battleroad.test/picture.jpg',
        );

        // Expectations
        $repository->expects()
            ->create($request)
            ->andReturn($entity);

        // Actions
        $result = $action->execute($request);

        // Assertions
        $this->assertSame($entity, $result);
    }
}
