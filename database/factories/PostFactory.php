<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

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
    public function definition()
    {
        return [
            'title' => fake()->realText(50),
            'description' => fake()->realText(200),
            'image' => fake()->bothify('images/#.jpg'),
            'view_count' =>fake()->numberBetween(1, 10000),
            'user_id' => fake()->numberBetween(1, User::count()),
        ];
    }
}
