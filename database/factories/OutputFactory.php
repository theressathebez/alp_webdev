<?php

namespace Database\Factories;

use App\Models\Registration;
use App\Models\Stage;
use App\Models\Result;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Output>
 */
class OutputFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'stage_id' => Stage::factory(),
            'registration_id' => Registration::factory(),
            'result_id' => Result::inRandomOrder()->first()->id
        ];
    }
}
