<?php

use Battleroad\Championship\Entities\Championship as Entity;
use Battleroad\Championship\Presenters\Championship as Presenter;

it('presents an championship entity', function () {
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

    $data = $presenter->present($championship);

    expect($data)->toBe([
        'id' => 1,
        'title' => 'some championship',
        'description' => 'some championship description',
        'location' => 'Brazil',
        'startAt' => $startAt->format('Y-m-d H:i:s'),
        'picture' => 'https://cdn.battleroad.test/picture.jpg',
    ]);
});
