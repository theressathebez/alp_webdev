<?php

namespace Database\Seeders;

use App\Models\Leader;
use App\Models\Team;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LeaderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Leader::factory(10)
            ->recycle(Team::factory(2)->create())
            ->create();
    }
}
