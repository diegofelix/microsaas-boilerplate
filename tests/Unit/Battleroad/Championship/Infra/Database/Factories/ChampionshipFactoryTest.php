<?php

namespace Tests\Unit\Battleroad\Championship\Infra\Database\Factories;

use Battleroad\Championship\Infra\Database\Factories\ChampionshipFactory;
use Illuminate\Database\Eloquent\Factories\Factory;
use Tests\TestCase;

class ChampionshipFactoryTest extends TestCase
{
    public function test_it_extends_the_illuminate_factory_and_overrides_the_model(): void
    {
        $factory = new ChampionshipFactory();

        $this->assertInstanceOf(Factory::class, $factory);
        $this->assertObjectHasProperty('model', $factory);
    }
}
