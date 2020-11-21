<?php

namespace Database\Seeders;

use App\Models\Practice;
use Illuminate\Database\Seeder;

class PracticeSeeder extends Seeder
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
            Practice::create(['name' => $contactPersonType[0]]);
        }
    }
}
