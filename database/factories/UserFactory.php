<?php

namespace Database\Factories;

use App\Models\Album;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // $make = (['Toyota', 'Toyota', 'Toyota']);

        // $model = ([
        //     'Hilux',
        //     'Prado',
        //     'Land Cruiser',
        //     'Fortuner',
        //     'Vios'
        // ]);

        // $color = ([
        //     'Super White',
        //     'Emotional Red',
        //     'Attitude Black Mica',
        //     'Navy Blue',
        // ]);

        // $transmission = ([
        //     'AT',
        //     'MT'
        // ]);

        return [
            'name' => fake() -> name(),
            'email' => fake() -> email(),
        ];
    }
}
