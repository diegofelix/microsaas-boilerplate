<?php

namespace Battleroad\Championship\Infra\Http\Controllers;

use App\Http\Controllers\Controller;
use Battleroad\Championship\DTOs\ChampionshipRequest;
use Battleroad\Championship\Infra\Http\Requests\RegisterNewChampionship as Request;
use Battleroad\Championship\Actions\RegisterNewChampionship as Service;
use Illuminate\Http\JsonResponse;
use Psy\VarDumper\Presenter;

class ChampionshipsController extends Controller
{
    public function __construct(
        private readonly Service $service,
        private readonly Presenter $presenter,
    ) {}

    public function store(Request $request): JsonResponse
    {
        $championshipRequest = new ChampionshipRequest(
            $request->user()->id,
            $request->get('name'),
            $request->get('description'),
            $request->get('location'),
            $request->get('eventStart'),
            $request->get('image')
        );

        $championship = $this->service->execute($championshipRequest);

        $data = $this->presenter->present($championship);

        return response()->json($data);
    }
}
