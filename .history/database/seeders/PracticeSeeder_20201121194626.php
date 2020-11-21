<?php

namespace Database\Seeders;

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
            ['Oceans']
        ];

        foreach ($contactPersonTypes as $contactPersonType) {
            ContactPersonType::create(['name' => $contactPersonType[0]]);
        }
    }
}