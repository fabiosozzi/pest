<?php

use App\Models\User;

describe('API', function () {
    it('cannot access the API "Get User" route unautenthicated', function () {
        $this->get(route('api.user.get'))->assertStatus(500);
    });

    it('can access the API "Get User" route if authenticated', function () {
        $user = User::factory()->create();
        $this->actingAs($user)->get(route('api.user.get'))->assertStatus(200);
    });

    it('can return the correct user from the API "Get User" route', function () {
        $user = User::factory()->create();
        $response = $this->actingAs($user)->get(route('api.user.get'))->assertStatus(200);
        expect($user->toArray())->toEqualCanonicalizing($response->json());
    });
});
