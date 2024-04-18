<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Client>
 */
class ClientFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        //capturar al user
        $user = User::factory()->create();
        $slug = $user->name;

        return [
            'user_id' => $user->id,
            'phone' => $this->faker->phoneNumber,
            'slug' => $slug,
        ];
    }
}
