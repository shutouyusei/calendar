<?php

namespace Tests\Feature;

use App\Models\Calendar;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CalendarTest extends TestCase
{
    use RefreshDatabase;

    public function test_authenticated_user_can_view_calendar_index()
    {
        $user = User::factory()->create();
        Calendar::factory()->count(3)->create(['user_id' => $user->id]);

        $response = $this->actingAs($user)->get(route('calendar.index'));

        $response->assertStatus(200);
        $response->assertViewIs('calendar.index');
        $response->assertViewHas('schedules');
    }

    public function test_authenticated_user_can_view_create_form()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->get(route('calendar.create'));

        $response->assertStatus(200);
        $response->assertViewIs('calendar.create');
    }

    public function test_authenticated_user_can_create_a_calendar_entry()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->post(route('calendar.store'), [
            'date' => '2026-04-15',
            'title' => 'Team Meeting',
            'description' => 'Weekly sync meeting',
        ]);

        $response->assertRedirect(route('calendar.index'));
        $this->assertDatabaseHas('calendars', [
            'user_id' => $user->id,
            'description' => 'Weekly sync meeting',
        ]);
    }

    public function test_authenticated_user_can_view_own_calendar_entry()
    {
        $user = User::factory()->create();
        $entry = Calendar::factory()->create(['user_id' => $user->id]);

        $response = $this->actingAs($user)->get(route('calendar.show', $entry->id));

        $response->assertStatus(200);
        $response->assertViewIs('calendar.show');
        $response->assertViewHas('schedule');
    }

    public function test_authenticated_user_can_update_own_calendar_entry()
    {
        $user = User::factory()->create();
        $entry = Calendar::factory()->create(['user_id' => $user->id]);

        $response = $this->actingAs($user)->put(route('calendar.update', $entry->id), [
            'date' => '2026-05-01',
            'title' => 'Updated Title',
            'description' => 'Updated description',
        ]);

        $response->assertRedirect(route('calendar.index'));
        $this->assertDatabaseHas('calendars', [
            'id' => $entry->id,
            'title' => 'Updated Title',
            'description' => 'Updated description',
        ]);
    }

    public function test_authenticated_user_can_delete_own_calendar_entry()
    {
        $user = User::factory()->create();
        $entry = Calendar::factory()->create(['user_id' => $user->id]);

        $response = $this->actingAs($user)->delete(route('calendar.destroy', $entry->id));

        $response->assertRedirect(route('calendar.index'));
        $this->assertDatabaseMissing('calendars', ['id' => $entry->id]);
    }

    public function test_unauthenticated_user_is_redirected_to_login()
    {
        $entry = Calendar::factory()->create();

        $this->get(route('calendar.index'))->assertRedirect(route('login'));
        $this->post(route('calendar.store'), [])->assertRedirect(route('login'));
        $this->get(route('calendar.show', $entry->id))->assertRedirect(route('login'));
        $this->put(route('calendar.update', $entry->id), [])->assertRedirect(route('login'));
        $this->delete(route('calendar.destroy', $entry->id))->assertRedirect(route('login'));
    }

    public function test_store_validation_errors_for_missing_fields()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->post(route('calendar.store'), []);

        $response->assertRedirect(route('calendar.create'));
        $response->assertSessionHasErrors(['date', 'description']);
    }

    public function test_update_validation_errors_for_missing_fields()
    {
        $user = User::factory()->create();
        $entry = Calendar::factory()->create(['user_id' => $user->id]);

        $response = $this->actingAs($user)->put(route('calendar.update', $entry->id), []);

        $response->assertRedirect(route('calendar.edit', $entry->id));
        $response->assertSessionHasErrors(['date', 'title', 'description']);
    }

    public function test_authenticated_user_can_view_mypage()
    {
        $user = User::factory()->create();
        $ownEntry = Calendar::factory()->create(['user_id' => $user->id]);
        $otherEntry = Calendar::factory()->create();

        $response = $this->actingAs($user)->get(route('calendar.mypage'));

        $response->assertStatus(200);
        $response->assertViewIs('calendar.index');
        $response->assertViewHas('schedules');
    }
}
