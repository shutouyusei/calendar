<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Calendar>
 */
class CalendarFactory extends Factory
{
    public function definition()
    {
        return [
            'user_id' => User::factory(),
            'date' => fake()->date(),
            'title' => fake()->sentence(3),
            'description' => fake()->paragraph(),
        ];
    }
}
