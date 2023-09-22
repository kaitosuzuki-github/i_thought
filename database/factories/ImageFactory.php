<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Storage;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Image>
 */
class ImageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $image_path = Storage::disk('s3')->putFile('/images', fake()->image(null, 640, 480));

        return [
            'name' => fake()->word(),
            'path' => $image_path,
        ];
    }
}
