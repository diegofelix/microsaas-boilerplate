<?php

namespace Battleroad\Championship\Presenters;

use Battleroad\Championship\Infra\Database\Factories\ChampionshipFactory;
use Battleroad\Championship\Infra\Database\Factories\CompetitionFactory;
use Battleroad\Championship\Infra\Database\Factories\GameFactory;
use Battleroad\Championship\Infra\Database\Factories\PlatformFactory;
use Battleroad\Championship\Infra\Models\Championship as ChampionshipModel;
use Battleroad\Championship\Infra\Models\Competition;
use Battleroad\Championship\Infra\Presenters\ChampionshipPresenter;
use Battleroad\Championship\Infra\Presenters\CompetitionPresenter;
use Mockery;
use MongoDB\BSON\ObjectId;
use Tests\TestCase;

class CompetitionPresenterTest extends TestCase
{
    public function test_it_presents_a_competition(): void
    {
        $presenter = new CompetitionPresenter();
        $game = GameFactory::new()->create();
        $platform = PlatformFactory::new()->create();
        $model = CompetitionFactory::new()->create([
            'game_id' => $game->_id,
            'platform_id' => $platform->_id,
        ]);
        $model->_id = new ObjectId();

        $expectedData = [
            'game' => $model->game->title,
            'platform' => $model->platform->title,
            'start_at' => $model->start_at->format('Y-m-d H:i:s'),
            'end_at' => $model->end_at->format('Y-m-d H:i:s'),
        ];

        // Actions
        $data = $presenter->single($model);

        // Assertions
        $this->assertEquals($expectedData, $data);
    }

    public function test_it_presents_many_competitions(): void
    {
        $presenter = new CompetitionPresenter();
        $game = GameFactory::new()->create();
        $platform = PlatformFactory::new()->create();
        $models = CompetitionFactory::new()->count(3)->create([
            'game_id' => $game->_id,
            'platform_id' => $platform->_id,
        ]);

        $model = $models->first();

        $expectedData = [
            'game' => $model->game->title,
            'platform' => $model->platform->title,
            'start_at' => $model->start_at->format('Y-m-d H:i:s'),
            'end_at' => $model->end_at->format('Y-m-d H:i:s'),
        ];

        // Actions
        $data = $presenter->many($models);

        // Assertions
        $this->assertCount(3, $data);
        $this->assertEquals($expectedData, $data[0]);
    }
}
