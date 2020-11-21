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
            ['Climate'],
            ['Food'],
            ['Forests'],
            ['Freshwater'],
            ['Oceans'],
            ['Wildlife']
        ];

        foreach ($practices as $practice) {
            DimPractice::create(['name' => $practice[0]]);
        }
    }
}
