<?php

namespace Battleroad\Championship\Actions;

use Battleroad\Championship\Infra\Http\Requests\AddCompetition;
use Battleroad\Championship\Infra\Models\Championship;
use Battleroad\Championship\Infra\Repositories\ChampionshipRepository;

class AddCompetitionToChampionship
{
    public function __construct(
        private readonly ChampionshipRepository $repository,
    ) {
    }

    public function execute(Championship $championship, AddCompetition $request): Championship
    {
        return $this->repository->addCompetition($championship, $request);
    }
}
