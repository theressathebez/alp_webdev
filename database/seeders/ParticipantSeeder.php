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
        Participant::factory(10)
            ->recycle(Team::factory(2)->create())
            ->recycle(Leader::factory(2)->create())
            ->create();
    }
}
