<?php

namespace Tests\Unit\Battleroad\Championship\Presenters;

use Battleroad\Championship\Infra\Database\Factories\Championship;
use Battleroad\Championship\Infra\Database\Factories\Competition;
use Battleroad\Championship\Infra\Models\Championship as ChampionshipModel;
use Battleroad\Championship\Infra\Presenters\Championship as Presenter;
use Battleroad\Championship\Infra\Presenters\Competition as CompetitionPresenter;
use DateTime;
use Mockery;
use MongoDB\BSON\ObjectId;
use MongoDB\Laravel\Eloquent\Model;
use Tests\TestCase;

class ChampionshipTest extends TestCase
{
    public function test_it_presents_a_championship(): void
    {
        // Set
        $competitionPresenter = Mockery::mock(CompetitionPresenter::class);
        $presenter = new Presenter($competitionPresenter);
        $model = Championship::new()->make();
        $model->_id = new ObjectId();

        $expectedData = [
            'id' => (string) $model->_id,
            'title' => $model->title,
            'description' => $model->description,
            'location' => $model->location,
            'startAt' => $model->start_at->format('Y-m-d H:i:s'),
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
        $presenter = new Presenter($competitionPresenter);
        /** @var ChampionshipModel $model */
        $model = Championship::new()->make();
        $competitions = Competition::new()->make();
        $model->_id = new ObjectId();
        $model->competitions()->associate($competitions);

        $expectedData = [
            'id' => (string) $model->_id,
            'title' => $model->title,
            'description' => $model->description,
            'location' => $model->location,
            'startAt' => $model->start_at->format('Y-m-d H:i:s'),
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
