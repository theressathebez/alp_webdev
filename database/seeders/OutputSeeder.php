<?php

namespace Database\Seeders;

use App\Models\Output;
use App\Models\Registration;
use App\Models\Stage;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Result;

class OutputSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $results = Result::all();
        Output::factory(10)
            ->recycle(Stage::factory(2)->create())
            ->recycle(Registration::factory(2)->create())
            ->state(function () use ($results) {
                return [
                    'result_id' => $results->random()->id, // Assign a random existing result
                ];
            })
            ->create();
    }
}
