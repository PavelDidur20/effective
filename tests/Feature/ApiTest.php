<?php

use App\Models\User;

uses(Tests\TestCase::class, Illuminate\Foundation\Testing\RefreshDatabase::class)
    ->in('Feature');

it('testUserApiReturnsUsers', function () {
    User::factory()->count(2)->create();
    $this->getJson('/api/users')
         ->assertStatus(200)
         ->assertJsonCount(2);
});
