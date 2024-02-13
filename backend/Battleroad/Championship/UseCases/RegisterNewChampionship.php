<?php

namespace Battleroad\Championship\UseCases;

use Battleroad\Championship\DTOs\ChampionshipRequest;
use Battleroad\Championship\Infra\Models\Championship as ChampionshipModel;
use Battleroad\Championship\Infra\Repositories\ChampionshipRepository;

class RegisterNewChampionship
{
    public function __construct(private readonly ChampionshipRepository $repository)
    {
    }

    public function execute(ChampionshipRequest $championshipRequest): ChampionshipModel
    {
        return $this->repository->create($championshipRequest);

        // @todo Dispatch NewChampionshipWasRegistered
    }
}
