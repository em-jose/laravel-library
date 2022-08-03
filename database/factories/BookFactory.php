<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title' => $this->faker->text(15, true),
            'description' => $this->faker->text(200, true),
            'isbn13' => $this->faker->isbn13(13, true),
            'publication_date' => $this->faker->date()
        ];
    }
}
