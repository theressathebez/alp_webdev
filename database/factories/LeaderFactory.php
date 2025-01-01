<?php

namespace Database\Factories;

use App\Models\Team;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Leader>
 */
class LeaderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'leader_name' => $this->faker->name, 
            'leader_email' => $this->faker->unique()->safeEmail, 
            'leader_phone' => $this->faker->phoneNumber, 
            'leader_dob' => $this->faker->date('Y-m-d', '-18 years'), 
            'leader_location' => $this->faker->address,
            'leader_password' => $this->faker->password(8,16),
            'team_id' => Team::factory()
        ];
    }
}
