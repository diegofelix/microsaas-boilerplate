<?php

use App\Models\User;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use function Pest\Laravel\{actingAs};

it('shows validation errors', function () {
    $user = User::factory()->create();

    actingAs($user)
        ->post('api/v1/championships', ['some' => 'input'])
        ->assertOk();
});
