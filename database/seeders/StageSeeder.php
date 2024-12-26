<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Stage;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Stage::factory(10)
        ->recycle(Category::factory(2)->create())
        ->create();
    }
}
