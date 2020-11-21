<?php

namespace Database\Seeders;

use App\Models\DimInitiative;
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
        DimInitiative::factory()
            ->times(10)
            ->create();
    }
}
