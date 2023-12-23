<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Band>
 */
class BandFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'band_name' => fake()->randomElement(['Bluemoon', 'Bluengon', 'Bluebells']),
            'genre' => fake()->randomElement(['RnB','Jazz','Rock', 'Pop','Jejemon','Jejemon gihapon', 'jejemon gihapon pero lahi']),
            'year_started' => fake()->date(),
            'membersCount' => fake()->randomNumber(1)
        ];
    }
}
