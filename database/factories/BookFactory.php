<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'cover_img' => $this->faker->imageUrl($width = 640, $height = 480),
            'title' => $this->faker->unique()->word,
            'isbn' => $this->faker->isbn10,
            'description' => $this->faker->text($maxNbChars = 300),
            'revision_number' $this->faker->randomDigit,
            'published_date' => $this->faker->now(),
            'publisher' => $this->faker->name,
            'author' => $this->faker->name,
            'genre' => $this->faker->id,
        ];
    }
}
