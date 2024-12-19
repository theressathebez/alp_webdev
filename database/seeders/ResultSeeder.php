<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ResultSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('results')->insert([
            [
                'result_name' => 'juara 1',
                'prizes' => 500000,
            ],
            [
                'result_name' => 'juara 2',
                'prizes' => 300000,
            ],
            [
                'result_name' => 'juara 3',
                'prizes' => 200000,
            ],
            [
                'result_name' => 'partisipan',
                'prizes' => 0,
            ]
        ]);
    }
}
