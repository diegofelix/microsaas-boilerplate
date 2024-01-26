<?php

namespace Battleroad\Championship\Infra\Http\Controllers;

use App\Http\Controllers\Controller;
use Battleroad\Championship\Actions\RegisterNewChampionship as Service;
use Battleroad\Championship\DTOs\ChampionshipRequest;
use Battleroad\Championship\Infra\Http\Requests\RegisterNewChampionship as Request;
use Battleroad\Championship\Infra\Presenters\Championship as Presenter;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

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
            $request->get('title'),
            $request->get('description'),
            $request->get('location'),
            $request->date('startAt'),
            $request->get('picture')
        );

        $championship = $this->service->execute($championshipRequest);

        $data = $this->presenter->present($championship);

        return response()->json($data, Response::HTTP_CREATED);
    }
}
