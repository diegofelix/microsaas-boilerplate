<?php

namespace Tests\Feature\Battleroad\Championship;

use Battleroad\Account\Infra\Database\Factories\UserFactory;
use Battleroad\Account\Infra\Models\User;
use Battleroad\Championship\Infra\Database\Factories\ChampionshipFactory;
use Battleroad\Championship\Infra\Database\Factories\GameFactory;
use Battleroad\Championship\Infra\Database\Factories\PlatformFactory;
use Battleroad\Championship\Infra\Models\Championship;
use DateTime;
use Symfony\Component\HttpFoundation\Response;
use Tests\TestCase;

class AddCompetitionTest extends TestCase
{
    public function test_should_not_add_competition_to_an_invalid_championship(): void
    {
        // Set
        $user = UserFactory::new()->create();
        $this->actingAs($user);

        // Actions
        $response = $this->postJson('api/v1/championships/invalid/competitions', ['some' => 'input']);

        // Assertions
        $response->assertNotFound();
    }

    public function test_should_should_validation_errors(): void
    {
        // Set
        $user = UserFactory::new()->create();
        $championship = ChampionshipFactory::new()->create();
        $championshipId = $championship->_id;
        $startAt = new DateTime('tomorrow');
        $endAt = new DateTime('tomorrow midnight');
        $this->actingAs($user);

        // Actions
        $response = $this->postJson("api/v1/championships/{$championshipId}/competitions", [
            'game_id' => '1',
            'platform_id' => '2',
            'start_at' => $startAt->format('Y-m-d H:i:s'),
            'end_at' => $endAt->format('Y-m-d H:i:s'),
        ]);

        // Assertions
        $response->assertUnprocessable();
        $response->assertJsonValidationErrors(['game_id', 'platform_id']);
    }

    public function test_should_not_add_competitions_without_being_logged_in(): void
    {
        // Actions
        $response = $this->postJson('api/v1/championships/{$championshipId}/competitions', ['some' => 'input']);

        // Assertions
        $response->assertUnauthorized();
    }

    public function test_should_add_competition_to_championship(): void
    {
        // Set
        $user = UserFactory::new()->create();
        $championship = ChampionshipFactory::new()->create();
        $game = GameFactory::new()->create();
        $platform = PlatformFactory::new()->create();
        $championshipId = $championship->_id;
        $startAt = new DateTime('tomorrow');
        $endAt = new DateTime('tomorrow midnight');
        $this->actingAs($user);

        // Actions
        $response = $this->postJson("api/v1/championships/{$championshipId}/competitions", [
            'game_id' => $game->_id,
            'platform_id' => $platform->_id,
            'start_at' => $startAt->format('Y-m-d H:i:s'),
            'end_at' => $endAt->format('Y-m-d H:i:s'),
        ]);

        // Assertions
        $response->assertStatus(Response::HTTP_CREATED);
        $jsonResponse = $response->json();
        $this->assertSame($jsonResponse['competitions'], [
            [
                'game' => $game->title,
                'platform' => $platform->title,
                'start_at' => $startAt->format('Y-m-d H:i:s'),
                'end_at' => $endAt->format('Y-m-d H:i:s'),
            ],
        ]);
    }
}
