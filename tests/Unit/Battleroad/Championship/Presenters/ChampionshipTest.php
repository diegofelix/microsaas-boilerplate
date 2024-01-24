<?php

namespace Tests\Unit\Battleroad\Championship\Presenters;

use Battleroad\Championship\Entities\Championship as Entity;
use Battleroad\Championship\Presenters\Championship as Presenter;
use DateTime;
use Tests\TestCase;

class ChampionshipTest extends TestCase
{
    public function test_it_presents_a_championship_entity(): void
    {
        // Set
        $presenter = new Presenter();
        $startAt = new DateTime('tomorrow midnight');
        $championship = new Entity(
            1,
            1,
            'some championship',
            'some championship description',
            'Brazil',
            $startAt,
            'https://cdn.battleroad.test/picture.jpg',
            new DateTime('today midnight'),
            new DateTime('today noon'),
        );
        $expectedData = [
            'id' => 1,
            'title' => 'some championship',
            'description' => 'some championship description',
            'location' => 'Brazil',
            'startAt' => $startAt->format('Y-m-d H:i:s'),
            'picture' => 'https://cdn.battleroad.test/picture.jpg',
        ];

        // Actions
        $data = $presenter->present($championship);

        // Assertions
        $this->assertEquals($expectedData, $data);
    }
}
