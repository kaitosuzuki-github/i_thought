<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'event' => fake()->realText(20),
            'emotion' => fake()->realText(10),
            'emotion_num' => fake()->numberBetween(0, 100),
            'created_at' => fake()->dateTimeBetween('-2 month', '+2 month'),
        ];
    }
}
