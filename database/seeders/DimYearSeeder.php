<?php

namespace Database\Seeders;

use App\Models\DimYear;
use Illuminate\Database\Seeder;

class DimYearSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DimYear::factory()
            ->times(80)
            ->create();
    }
}
