<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Post;
use App\Models\Image;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $users = User::factory()
            ->count(10)
            ->hasPosts(2)
            ->create();

        foreach ($users as $user) {
            $post_id = $user->posts()->first()->id;
            Image::factory()->create(['post_id' => $post_id]);
        }
    }
}
