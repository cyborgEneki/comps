<?php

namespace Database\Factories;

use App\Models\DimYear;
use Illuminate\Database\Eloquent\Factories\Factory;

class DimYearFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = DimYear::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'year' => $this->faker->unique()->numberBetween(1970, 2050)
        ];
    }
}
