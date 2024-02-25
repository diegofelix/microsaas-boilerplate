<?php

namespace Battleroad\Championship\Infra\Http\Controllers;

use App\Http\Controllers\Controller;
use Battleroad\Championship\Infra\Http\Requests\AddCompetition;
use Battleroad\Championship\Infra\Models\Championship;
use Battleroad\Championship\Infra\Presenters\ChampionshipPresenter;
use Battleroad\Championship\Actions\AddCompetitionToChampionship;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class CompetitionsController extends Controller
{
    public function __construct(
        private readonly AddCompetitionToChampionship $service,
        private readonly ChampionshipPresenter $presenter,
    ) {
    }

    public function store(Championship $championship, AddCompetition $request): JsonResponse
    {
        $championship = $this->service->execute($championship, $request);

        $data = $this->presenter->single($championship);

        return response()->json($data, Response::HTTP_CREATED);
    }
}
