<?php

use App\Models\Landlord;
use App\Models\User;
use function Pest\Laravel\{get, post, put, delete};

beforeEach(function () {
    $this->user = User::factory()->create();
    $this->actingAs($this->user);
});

test('user can view landlord list', function () {
    $landlords = Landlord::factory()->count(3)->create();

    $response = get(route('landlords.index'));

    $response->assertStatus(200);
    $response->assertViewIs('livewire.landlord.landlord-list');
    $landlords->each(function ($landlord) use ($response) {
        $response->assertSee($landlord->user->name);
        $response->assertSee($landlord->user->email);
        $response->assertSee($landlord->company_name);
        $response->assertSee($landlord->phone_number);
    });
});

test('user can create a new landlord', function () {
    $landlordData = [
        'name' => 'John Doe',
        'email' => 'john@example.com',
        'password' => 'password123',
        'company_name' => 'Doe Properties',
        'phone_number' => '1234567890',
    ];

    $response = post(route('landlords.store'), $landlordData);

    $response->assertRedirect(route('landlords.index'));
    $this->assertDatabaseHas('users', [
        'name' => 'John Doe',
        'email' => 'john@example.com',
    ]);
    $this->assertDatabaseHas('landlords', [
        'company_name' => 'Doe Properties',
        'phone_number' => '1234567890',
    ]);
});

test('user can view landlord edit form', function () {
    $landlord = Landlord::factory()->create();

    $response = get(route('landlords.edit', $landlord->id));

    $response->assertStatus(200);
    $response->assertViewIs('livewire.landlord.landlord-form');
    $response->assertSee($landlord->user->name);
    $response->assertSee($landlord->user->email);
    $response->assertSee($landlord->company_name);
    $response->assertSee($landlord->phone_number);
});

test('user can update a landlord', function () {
    $landlord = Landlord::factory()->create();
    $updatedData = [
        'name' => 'Updated Name',
        'email' => 'updated@example.com',
        'company_name' => 'Updated Company',
        'phone_number' => '9876543210',
    ];

    $response = put(route('landlords.update', $landlord->id), $updatedData);

    $response->assertRedirect(route('landlords.index'));
    $this->assertDatabaseHas('users', [
        'id' => $landlord->user_id,
        'name' => 'Updated Name',
        'email' => 'updated@example.com',
    ]);
    $this->assertDatabaseHas('landlords', [
        'id' => $landlord->id,
        'company_name' => 'Updated Company',
        'phone_number' => '9876543210',
    ]);
});

test('user can delete a landlord', function () {
    $landlord = Landlord::factory()->create();

    $response = delete(route('landlords.destroy', $landlord->id));

    $response->assertRedirect(route('landlords.index'));
    $this->assertDatabaseMissing('landlords', ['id' => $landlord->id]);
    $this->assertDatabaseMissing('users', ['id' => $landlord->user_id]);
});

test('validation errors are shown when creating a landlord with invalid data', function () {
    $invalidData = [
        'name' => '',
        'email' => 'not-an-email',
        'password' => 'short',
        'company_name' => '',
        'phone_number' => '',
    ];

    $response = post(route('landlords.store'), $invalidData);

    $response->assertSessionHasErrors(['name', 'email', 'password', 'company_name', 'phone_number']);
});

test('validation errors are shown when updating a landlord with invalid data', function () {
    $landlord = Landlord::factory()->create();
    $invalidData = [
        'name' => '',
        'email' => 'not-an-email',
        'company_name' => '',
        'phone_number' => '',
    ];

    $response = put(route('landlords.update', $landlord->id), $invalidData);

    $response->assertSessionHasErrors(['name', 'email', 'company_name', 'phone_number']);
});
