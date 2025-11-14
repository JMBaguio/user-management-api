<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\EcoEducationalPost;
use App\Models\User;

class EcoPostSeeder extends Seeder
{
    public function run(): void
    {
        $users = User::all();

        if ($users->count() === 0) {
            $this->command->info('No users found, please create users first!');
            return;
        }

        // Create 10 dummy posts
        foreach (range(1, 10) as $i) {
            EcoEducationalPost::create([
                'title' => "Eco Post Title $i",
                'content' => "This is the content for eco-educational post number $i. Learn more about the environment and sustainability.",
                'image' => null, // you can replace with fake images later
                'video_link' => "https://www.youtube.com/watch?v=dQw4w9WgXcQ", // dummy video link
                'user_id' => $users->random()->id,
            ]);
        }
    }
}
