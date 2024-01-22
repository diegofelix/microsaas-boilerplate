<?php

use App\Models\User;
use function Pest\Laravel\{actingAs};
use function Pest\Laravel\{postJson};

it('shows validation errors', function () {
    $user = User::factory()->create();

    actingAs($user)
        ->postJson('api/v1/championships', ['some' => 'input'])
        ->assertJsonValidationErrors([
            'title', 'description', 'location', 'startAt', 'picture'
        ]);
});

it('cannot create a championship without being logged in', function () {
    postJson('api/v1/championships', ['some' => 'input'])
        ->assertUnauthorized();
});

it('can register a new championship', function () {
    $user = User::factory()->create();
    $startAt = new DateTime('tomorrow midnight');

    actingAs($user)
        ->postJson('api/v1/championships', [
            'title' => 'Capcom Cup',
            'description' => 'The ultimate Fighting Game Championship',
            'location' => 'Brazil',
            'startAt' => $startAt->format('Y-m-d'),
            'picture' => 'https://cdn.some.url/picture.jpg',
        ])
        ->assertOk()
        ->assertJsonFragment([
            'title' => 'Capcom Cup',
            'description' => 'The ultimate Fighting Game Championship',
            'location' => 'Brazil',
            'picture' => 'https://cdn.some.url/picture.jpg',
            'startAt' => $startAt->format('Y-m-d H:i:s'),
        ]);
});
