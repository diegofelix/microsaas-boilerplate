<?php

namespace Tests\Unit\Battleroad\Championship\Presenters;

use Battleroad\Championship\Infra\Database\Factories\Championship;
use Battleroad\Championship\Presenters\Championship as Presenter;
use DateTime;
use MongoDB\BSON\ObjectId;
use Tests\TestCase;

class ChampionshipTest extends TestCase
{
    public function test_it_presents_a_championship_entity(): void
    {
        // Set
        $presenter = new Presenter();
        $startAt = new DateTime('tomorrow midnight');
        $model = Championship::new()->make();
        $model->_id = new ObjectId();
//        $championship = new Entity(
//            1,
//            1,
//            'some championship',
//            'some championship description',
//            'Brazil',
//            $startAt,
//            'https://cdn.battleroad.test/picture.jpg',
//            new DateTime('today midnight'),
//            new DateTime('today noon'),
//        );
        $expectedData = [
            'id' => (string) $model->_id,
            'title' => $model->title,
            'description' => $model->description,
            'location' => $model->location,
            'startAt' => $model->start_at->format('Y-m-d H:i:s'),
            'picture' => $model->picture,
        ];

        // Actions
        $data = $presenter->present($model);

        // Assertions
        $this->assertEquals($expectedData, $data);
    }
}
