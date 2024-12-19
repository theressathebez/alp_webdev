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
        Category::factory(10)
            ->recycle(Competition::factory(2)->create())
            ->create();
    }
}
