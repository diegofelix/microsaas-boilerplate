<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterNewChampionship;
use Battleroad\Championship\Repository;
use Illuminate\Http\JsonResponse;
use Psy\VarDumper\Presenter;

class ChampionshipsController extends Controller
{
    public function __construct(
        private readonly Repository $repository,
        private readonly Presenter $presenter,
    ){}

    public function store(RegisterNewChampionship $request): JsonResponse
    {
        $championship = $this->repository->createFromArray($request->validated());

        $data = $this->presenter->present($championship);

        return response()->json($data);
    }
}
