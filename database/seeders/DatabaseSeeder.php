<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $alice = \App\Models\User::factory()->create([
            'name' => 'Alice',
            'email' => 'alice@example.com',
            'password' => bcrypt('password'),
        ]);

        $bob = \App\Models\User::factory()->create([
            'name' => 'Bob',
            'email' => 'bob@example.com',
            'password' => bcrypt('password'),
        ]);

        $charlie = \App\Models\User::factory()->create([
            'name' => 'Charlie',
            'email' => 'charlie@example.com',
            'password' => bcrypt('password'),
        ]);

        $today = now();

        $aliceEvents = [
            ['date' => $today->copy()->format('Y-m-d'), 'title' => 'Team Meeting', 'description' => 'Weekly team sync meeting'],
            ['date' => $today->copy()->addDays(3)->format('Y-m-d'), 'title' => 'Design Review', 'description' => 'Review new UI mockups'],
            ['date' => $today->copy()->addDays(7)->format('Y-m-d'), 'title' => 'Client Presentation', 'description' => 'Present project progress to client'],
        ];

        $bobEvents = [
            ['date' => $today->copy()->format('Y-m-d'), 'title' => 'Code Review', 'description' => 'Review pull requests and merge branches'],
            ['date' => $today->copy()->addDays(2)->format('Y-m-d'), 'title' => 'Database Migration', 'description' => 'Plan and execute database schema update'],
            ['date' => $today->copy()->addDays(5)->format('Y-m-d'), 'title' => 'Sprint Planning', 'description' => 'Plan tasks for the next sprint'],
        ];

        $charlieEvents = [
            ['date' => $today->copy()->addDays(1)->format('Y-m-d'), 'title' => 'Lunch with Team', 'description' => 'Team lunch at downtown restaurant'],
            ['date' => $today->copy()->addDays(4)->format('Y-m-d'), 'title' => 'Security Audit', 'description' => 'Review application security configurations'],
            ['date' => $today->copy()->addDays(7)->format('Y-m-d'), 'title' => 'Deploy to Staging', 'description' => 'Deploy latest build to staging environment'],
        ];

        foreach ($aliceEvents as $event) {
            \App\Models\Calendar::create(array_merge($event, ['user_id' => $alice->id]));
        }
        foreach ($bobEvents as $event) {
            \App\Models\Calendar::create(array_merge($event, ['user_id' => $bob->id]));
        }
        foreach ($charlieEvents as $event) {
            \App\Models\Calendar::create(array_merge($event, ['user_id' => $charlie->id]));
        }
    }
}
