<?php

namespace Tests\Unit\Battleroad\Championship\Presenters;

use Battleroad\Championship\Infra\Database\Factories\ChampionshipFactory;
use Battleroad\Championship\Infra\Database\Factories\CompetitionFactory;
use Battleroad\Championship\Infra\Models\Championship as ChampionshipModel;
use Battleroad\Championship\Infra\Presenters\ChampionshipPresenter;
use Battleroad\Championship\Infra\Presenters\CompetitionPresenter;
use Mockery;
use MongoDB\BSON\ObjectId;
use Tests\TestCase;

class ChampionshipPresenterTest extends TestCase
{
    public function test_it_presents_a_championship(): void
    {
        // Set
        $competitionPresenter = Mockery::mock(CompetitionPresenter::class);
        $presenter = new ChampionshipPresenter($competitionPresenter);
        $model = ChampionshipFactory::new()->make();
        $model->_id = new ObjectId();

        $expectedData = [
            'id' => (string) $model->_id,
            'title' => $model->title,
            'description' => $model->description,
            'location' => $model->location,
            'start_at' => $model->start_at->format('Y-m-d H:i:s'),
            'end_at' => $model->end_at->format('Y-m-d H:i:s'),
            'picture' => $model->picture,
            'competitions' => [],
        ];

        // Expectations
        $competitionPresenter->expects()
            ->many($model->competitions)
            ->andReturn([]);

        // Actions
        $data = $presenter->single($model);

        // Assertions
        $this->assertEquals($expectedData, $data);
    }

    public function test_it_presents_a_championship_with_its_competitions(): void
    {
        // Set
        $competitionPresenter = Mockery::mock(CompetitionPresenter::class);
        $presenter = new ChampionshipPresenter($competitionPresenter);
        /** @var ChampionshipModel $model */
        $model = ChampionshipFactory::new()->make();
        $competitions = CompetitionFactory::new()->make();
        $model->_id = new ObjectId();
        $model->competitions()->associate($competitions);

        $expectedData = [
            'id' => (string) $model->_id,
            'title' => $model->title,
            'description' => $model->description,
            'location' => $model->location,
            'start_at' => $model->start_at->format('Y-m-d H:i:s'),
            'end_at' => $model->end_at->format('Y-m-d H:i:s'),
            'picture' => $model->picture,
            'competitions' => ['presented' => 'data'],
        ];

        // Expectations
        $competitionPresenter->expects()
            ->many($model->competitions)
            ->andReturn(['presented' => 'data']);

        // Actions
        $data = $presenter->single($model);

        // Assertions
        $this->assertEquals($expectedData, $data);
    }
}
