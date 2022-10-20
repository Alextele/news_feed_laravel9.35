<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\News>
 */
class NewsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $ispublished = rand(1,5) > 1;
        return [
            'category_id'   => $this->faker->biasedNumberBetween(1,10),
            'title'         => $this->faker->sentence(rand(3,8), true),
            'content'       => $this->faker->realText(rand(1000,4000)),
            'is_published'  => $ispublished,
            'published_at'  => $ispublished ? $this->faker->dateTimeBetween('-5 months', '-1 days'): null,
        ];
    }
}
