<?php

namespace Database\Factories;

use App\Models\Leader;
use App\Models\Team;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Participant>
 */
class ParticipantFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'participant_name' => $this->faker->name,
            'participant_dob' => $this->faker->date('Y-m-d', '-18 years'), 
            'participant_location' => $this->faker->address,
            'participant_email' => $this->faker->unique()->safeEmail,
            'participant_phone' => $this->faker->phoneNumber,

            'team_id'=> Team::factory(),
            'leader_id'=>Leader::factory()
        ];
    }
}
