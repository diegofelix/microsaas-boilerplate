<?php

namespace Battleroad\Championship\Actions;

use Battleroad\Championship\DTOs\AddCompetitionRequest;
use Battleroad\Championship\Infra\Models\Championship;
use Battleroad\Championship\Infra\Repositories\ChampionshipRepository;

class AddCompetitionToChampionship
{
    public function __construct(private readonly ChampionshipRepository $repository)
    {
    }

    public function execute(AddCompetitionRequest $request): Championship
    {
        return $this->repository->addCompetition($request);
    }
}
