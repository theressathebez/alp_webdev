<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Registration;
use App\Models\Team;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RegistrationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Registration::factory(10)
            ->recycle(Team::factory(2)->create())
            ->recycle(Category::factory(5)->create())
            ->create();
    }
}
