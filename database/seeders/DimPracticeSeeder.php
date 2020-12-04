<?php

namespace Database\Seeders;

use App\Models\DimPractice;
use Illuminate\Database\Seeder;

class DimPracticeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $practices = [
            [1], ['Climate'],
            [2], ['Food'],
            [3], ['Forests'],
            [4], ['Freshwater'],
            [5], ['Oceans'],
            [6], ['Wildlife']
        ];

        foreach ($practices as $practice) {
            DimPractice::create([
                'id' => $practice[0],
                'name' => $practice[1]
            ]);
        }
    }
}
