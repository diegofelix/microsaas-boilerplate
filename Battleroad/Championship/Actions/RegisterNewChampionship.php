<?php

namespace Battleroad\Championship\Actions;

use Battleroad\Championship\DTOs\ChampionshipRequest;
use Battleroad\Championship\Infra\Models\Championship as ChampionshipModel;
use Battleroad\Championship\Infra\Repositories\Championship as Repository;

class RegisterNewChampionship
{
    public function __construct(private readonly Repository $repository)
    {
    }

    public function execute(ChampionshipRequest $championshipRequest): ChampionshipModel
    {
        return $this->repository->create($championshipRequest);

        // @todo Dispatch NewChampionshipWasRegistered
    }
}
