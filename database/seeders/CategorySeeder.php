<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Competition;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $competition = Competition::all();
        Category::factory(10)
            ->state(function () use ($competition) {
                return [
                    'competition_id' => $competition->random()->id, // Assign a random existing result
                ];
            })
            ->create();
    }
}
