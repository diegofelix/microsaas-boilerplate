<?php

namespace Tests\Feature\Battleroad\Championship;

use Battleroad\Account\Infra\Database\Factories\UserFactory;
use Battleroad\Account\Infra\Models\User;
use DateTime;
use Symfony\Component\HttpFoundation\Response;
use Tests\TestCase;

class RegisterChampionshipTest extends TestCase
{
    public function test_should_shows_validation_errors(): void
    {
        // Set
        $user = UserFactory::new()->create();
        $this->actingAs($user);

        // Actions
        $response = $this->postJson('api/v1/championships', ['some' => 'input']);

        // Assertions
        $response->assertUnprocessable();
        $response->assertJsonValidationErrors([
            'title', 'description', 'location', 'startAt', 'picture',
        ]);
    }

    public function test_should_not_create_a_championship_without_being_logged_in(): void
    {
        // Actions
        $response = $this->postJson('api/v1/championships', ['some' => 'input']);

        // Assertions
        $response->assertUnauthorized();
    }

    public function test_it_can_register_a_new_championship(): void
    {
        // Set
        $user = UserFactory::new()->create();
        $startAt = new DateTime('tomorrow midnight');
        $this->actingAs($user);

        // Actions
        $response = $this->postJson('api/v1/championships', [
            'title' => 'Capcom Cup',
            'description' => 'The ultimate Fighting Game Championship',
            'location' => 'Brazil',
            'startAt' => $startAt->format('Y-m-d H:i:s'),
            'picture' => 'https://cdn.some.url/picture.jpg',
        ]);

        // Assertions
        $response->assertStatus(Response::HTTP_CREATED);
        $response->assertJsonFragment([
            'title' => 'Capcom Cup',
            'description' => 'The ultimate Fighting Game Championship',
            'location' => 'Brazil',
            'picture' => 'https://cdn.some.url/picture.jpg',
            'startAt' => $startAt->format('Y-m-d H:i:s'),
        ]);
    }
}
