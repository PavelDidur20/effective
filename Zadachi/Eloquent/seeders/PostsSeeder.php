<?php
namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostsSeeder extends Seeder
{
   public function run()
{
    \App\Models\Post::factory()
        ->count(5)
        ->sequence(                                      // give custom data
            fn($sequence) => [
                'content'  => 'This is the body of sample post ' . ($sequence->index + 1) . '.',
            ]
        )
        ->create();
}
}