<?php

namespace Database\Factories;

use App\Models\Category;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Stage>
 */
class StageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'stage_name' => $this->faker->words(3, true), // Generates a random name with 3 words
            'stage_start' => $this->faker->date('Y-m-d'), // Generates a random date for the start
            'stage_end' => $this->faker->date('Y-m-d'),
            'category_id'=>Category::factory()
        ];
    }
}
