<?php

namespace Battleroad\Championship\Infra\Http\Controllers;

use App\Http\Controllers\Controller;
use Battleroad\Championship\Infra\Http\Requests\RegisterNewChampionship;
use Battleroad\Championship\Infra\Presenters\ChampionshipPresenter;
use Battleroad\Championship\Actions\RegisterNewChampionship as Service;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class ChampionshipsController extends Controller
{
    public function __construct(
        private readonly Service $service,
        private readonly ChampionshipPresenter $presenter,
    ) {
    }

    public function store(RegisterNewChampionship $request): JsonResponse
    {
        $championship = $this->service->execute($request);

        $data = $this->presenter->single($championship);

        return response()->json($data, Response::HTTP_CREATED);
    }
}
