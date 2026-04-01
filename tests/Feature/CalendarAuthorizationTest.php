<?php

namespace Tests\Feature;

use App\Models\Calendar;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CalendarAuthorizationTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_can_edit_own_calendar_entry()
    {
        $user = User::factory()->create();
        $entry = Calendar::factory()->create(['user_id' => $user->id]);

        $response = $this->actingAs($user)->get(route('calendar.edit', $entry->id));

        $response->assertStatus(200);
    }

    public function test_user_cannot_edit_another_users_calendar_entry()
    {
        $owner = User::factory()->create();
        $other = User::factory()->create();
        $entry = Calendar::factory()->create(['user_id' => $owner->id]);

        $response = $this->actingAs($other)->get(route('calendar.edit', $entry->id));

        $response->assertStatus(403);
    }

    public function test_user_can_delete_own_calendar_entry()
    {
        $user = User::factory()->create();
        $entry = Calendar::factory()->create(['user_id' => $user->id]);

        $response = $this->actingAs($user)->delete(route('calendar.destroy', $entry->id));

        $response->assertRedirect(route('calendar.index'));
        $this->assertDatabaseMissing('calendars', ['id' => $entry->id]);
    }

    public function test_user_cannot_delete_another_users_calendar_entry()
    {
        $owner = User::factory()->create();
        $other = User::factory()->create();
        $entry = Calendar::factory()->create(['user_id' => $owner->id]);

        $response = $this->actingAs($other)->delete(route('calendar.destroy', $entry->id));

        $response->assertStatus(403);
        $this->assertDatabaseHas('calendars', ['id' => $entry->id]);
    }

    public function test_user_cannot_update_another_users_calendar_entry()
    {
        $owner = User::factory()->create();
        $other = User::factory()->create();
        $entry = Calendar::factory()->create(['user_id' => $owner->id]);

        $response = $this->actingAs($other)->put(route('calendar.update', $entry->id), [
            'date' => '2026-05-01',
            'title' => 'Hacked',
            'description' => 'Unauthorized update',
        ]);

        $response->assertStatus(403);
    }

    public function test_user_cannot_view_another_users_calendar_entry()
    {
        $owner = User::factory()->create();
        $other = User::factory()->create();
        $entry = Calendar::factory()->create(['user_id' => $owner->id]);

        $response = $this->actingAs($other)->get(route('calendar.show', $entry->id));

        $response->assertStatus(403);
    }

    public function test_guest_is_redirected_to_login_for_protected_routes()
    {
        $entry = Calendar::factory()->create();

        $this->get(route('calendar.index'))->assertRedirect(route('login'));
        $this->get(route('calendar.create'))->assertRedirect(route('login'));
        $this->get(route('calendar.show', $entry->id))->assertRedirect(route('login'));
        $this->get(route('calendar.edit', $entry->id))->assertRedirect(route('login'));
        $this->delete(route('calendar.destroy', $entry->id))->assertRedirect(route('login'));
    }
}
