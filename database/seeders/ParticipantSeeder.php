<?php

namespace Database\Seeders;

use App\Models\Leader;
use App\Models\Participant;
use App\Models\Team;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ParticipantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Buat beberapa Team terlebih dahulu
        $teams = Team::factory(10)->create();

        // Untuk setiap Team, buat Participant dan tetapkan ke Team
        foreach ($teams as $team) {
            Participant::factory(5) // Misalnya, 5 peserta untuk setiap tim
                ->create([
                    'team_id' => $team->id,
                ]);
        }
    }
}
