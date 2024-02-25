<?php

namespace Battleroad\Championship\Actions;

use Battleroad\Championship\Infra\Http\Requests\RegisterNewChampionship as Request;
use Battleroad\Championship\Infra\Models\Championship as ChampionshipModel;
use Battleroad\Championship\Infra\Repositories\ChampionshipRepository;

class RegisterNewChampionship
{
    public function __construct(private readonly ChampionshipRepository $repository)
    {
    }

    public function execute(Request $request): ChampionshipModel
    {
        return $this->repository->create($request);

        // @todo Dispatch NewChampionshipWasRegistered
    }
}
