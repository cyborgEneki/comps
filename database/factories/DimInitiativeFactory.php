<?php

namespace Database\Factories;

use App\Models\DimInitiative;
use Illuminate\Database\Eloquent\Factories\Factory;

class DimInitiativeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = DimInitiative::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $start_year = $this->faker->dateTimeBetween('-10 years', 'now')->format('Y');

        return [
            'name' => $this->faker->word,
            'lead_name' => $this->faker->name,
            'lead_email' => $this->faker->unique()->safeEmail,
            'start_year' => $this->faker->dateTimeBetween('-10 years', 'now')->format('Y'),
            'end_year' => $this->faker->dateTimeBetween($start_year, '+10 years')->format('Y'),
            'statement' => $this->faker->paragraph(),
            'number_of_subcategories' => $this->faker->randomDigitNotNull(),
        ];
    }
}
