<?php

namespace Database\Seeders;

use App\Models\Leader;
use App\Models\Team;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LeaderSeeder extends Seeder
{
    public function run(): void
    {
        $teams = Team::with('participants')->get();

        foreach ($teams as $team) {
            // Pastikan tim memiliki peserta
            if ($team->participants->isNotEmpty()) {
                // Ambil satu participant secara acak dari tim
                $participant = $team->participants->random();

                // Periksa apakah leader sudah ada untuk tim ini
                if (!$team->leader()->exists()) {
                    // Buat leader berdasarkan data peserta
                    Leader::create([
                        'leader_name' => $participant->participant_name,
                        'leader_email' => $participant->participant_email,
                        'leader_phone' => $participant->participant_phone,
                        'leader_dob' => $participant->participant_dob,
                        'leader_location' => $participant->participant_location,
                        'team_id' => $team->id, // Tetapkan ID tim
                    ]);
                }
            }
        }
    }
}
