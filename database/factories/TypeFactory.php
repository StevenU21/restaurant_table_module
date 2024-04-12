<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Type>
 */
class TypeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name,
            'unit_price' => fake()->randomFloat(2, 1, 100),
            'capacity' => fake()->numberBetween(1, 10),
        ];
    }

    //run `php artisan db:seed --class=TypeSeeder` to seed the database
}
