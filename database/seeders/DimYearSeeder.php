<?php

namespace Database\Seeders;

use App\Models\DimYear;
use Illuminate\Database\Seeder;

class DimInitiativeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DimYear::factory()
            ->times(10)
            ->create();
    }
}
