<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterNewChampionship;
use Battleroad\Championship\Repository;

class ChampionshipsController extends Controller
{
    public function __construct(
        private readonly Repository $repository,
        private readonly Presenter $presenter,
    ){}

    public function store(RegisterNewChampionship $request)
    {
        $championship = $this->repository->createFromArray($request->validated());

        return $this->presenter->present($championship);
    }
}
