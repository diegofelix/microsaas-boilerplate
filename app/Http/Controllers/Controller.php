<?php

namespace App\Http\Controllers;

use Battleroad\Championship\Banner;
use Battleroad\Championship\Championship;
use Battleroad\Championship\Location;
use Battleroad\Championship\Organizer;
use Battleroad\Common\State;
use DateTime;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    function testing(Request $request) {

        $championship = new Championship(
            new Organizer(1, 'Diego Felix'),
            'Capcom Cup',
            'O Maior campeonato de jogos de luta do mundo!',
            new Location(
                '08220000', 
                'SP',
                'São Paulo',
                'Interlagos',
                'Rua Galleteri Blota',
                123,
            ),
            new DateTime('2024-06-01'),
            new DateTime('2024-06-03'),
            new Banner('https://cdn.battleroad.com.br/some-img.jpg')
        );
    }
}
