<?php

namespace Battleroad\Account\Infra\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Tests\TestCase;

class UserFactoryTest extends TestCase
{
    public function test_it_extends_the_illuminate_factory_and_overrides_the_model(): void
    {
        $factory = new UserFactory();

        $this->assertInstanceOf(Factory::class, $factory);
        $this->assertObjectHasProperty('model', $factory);
    }
}
