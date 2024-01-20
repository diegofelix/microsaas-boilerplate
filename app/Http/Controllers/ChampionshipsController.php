<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterNewChampionship as Request;
use Battleroad\Championship\Services\RegisterNewChampionship as Service;
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
        $championship = $this->service->createFromRequest($request);

        $data = $this->presenter->present($championship);

        return response()->json($data);
    }
}
