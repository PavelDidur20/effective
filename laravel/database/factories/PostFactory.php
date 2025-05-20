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
     protected $model = \App\Models\Post::class;

    public function definition()
    {
        return [
            'user_id'    => 1,                        
            'content'      => $this->faker->sentence,
        ];
    }
}
