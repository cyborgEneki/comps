<?php

namespace Database\Factories;

use App\Models\Initiative;
use Illuminate\Database\Eloquent\Factories\Factory;

class InitiativeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Initiative::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'initiative_name' => $this->faker->name,
            'initiative_lead' => $this->faker->unique()->safeEmail,
            'initiative_lead_email' => now(),
            'initiative_start_year' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'initiative_end_year' => Str::random(10),
            'initiative_statement' => Str::random(10),
            'number_of_categories' => Str::random(10),
        ];
    }
}
