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
        $start_year$this->faker->dateTimeBetween('-10 years', 'now')->format('Y'));
        return [
            'name' => $this->faker->word,
            'lead_name' => $this->faker->name,
            'lead_email' => $this->faker->unique()->safeEmail,
            'start_year' => $this->faker->dateTimeBetween('-10 years', 'now')->format('Y'),
            'end_year' => $this->faker->dateTimeBetween($start_year, 'now')->format('Y'),
            'statement' => $this->faker->paragraph(),
            'number_of_categories' => $this->faker->randomDigitNotNull(),
        ];
    }
}
