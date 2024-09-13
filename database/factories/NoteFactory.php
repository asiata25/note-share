<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Note>
 */
class NoteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->words(4, true),
            'body' => $this->faker->paragraph(),
            'recipient' => $this->faker->email(),
            'send_date' => $this->faker->dateTimeBetween('now', '1 week'),
            'is_published' => $this->faker->boolean(),
            'heart_count' => $this->faker->numberBetween(0, 100),
            'user_id' => User::Factory()
        ];
    }
}
