<?php

namespace Battleroad\Championship\Actions;

use Battleroad\Championship\DTOs\ChampionshipRequest;
use Battleroad\Championship\Entities\Championship;
use Battleroad\Championship\Infra\Http\Requests\RegisterNewChampionship as Request;
use Battleroad\Championship\Repository;

class RegisterNewChampionship
{
    public function __construct(private readonly Repository $repository)
    {
    }

    public function execute(ChampionshipRequest $championshipRequest): Championship
    {
        return $this->repository->create($championshipRequest);

        // @todo Dispatch NewChampionshipWasRegistered
    }
}
