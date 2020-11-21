<?php

namespace Database\Seeders;

use App\Models\Initiative;
use Illuminate\Database\Seeder;

class InitiativeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Initiative::factory()
            ->times(10)
            ->create();
    }
}
