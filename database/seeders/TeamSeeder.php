<?php

namespace Database\Seeders;

use App\Models\Institution;
use App\Models\Team;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TeamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Team::factory(10)
        ->recycle(Institution::factory(2)->create())
        ->create();
    }
}
