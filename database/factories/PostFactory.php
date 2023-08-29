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
            'title' => $title = $this->faker->words(3, true),
            'slug' => str($title)->slug(),
            'body' => $this->faker->realText(1000),
            'published_at' => $this->faker->dateTimeBetween('-3 years'),
        ];
    }
}
