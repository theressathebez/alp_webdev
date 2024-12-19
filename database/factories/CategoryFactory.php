<?php

namespace Database\Factories;

use App\Models\Competition;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'category_name' => $this->faker->word, 
            'guidebook' => $this->faker->url, 
            'category_desc' => $this->faker->paragraph,
            'competition_id' => Competition::factory()
        ];
    }
}
