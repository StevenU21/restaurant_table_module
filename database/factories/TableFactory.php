<?php

namespace Database\Factories;

use App\Models\Table;
use App\Models\Type;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Table>
 */
class TableFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $lastTableNumber = Table::max('table_number');
        if ($lastTableNumber) {
            $lastLetter = substr($lastTableNumber, 0, 1);
            $lastNumber = substr($lastTableNumber, 1);
            if ($lastNumber < 9) {
                $newTableNumber = $lastLetter . ($lastNumber + 1);
            } else {
                $newTableNumber = chr(ord($lastLetter) + 1) . '1';
            }
        } else {
            $newTableNumber = 'A1';
        }

        return [
            'table_number' => $newTableNumber,
            'status' => $this->faker->randomElement(['disponible', 'reservada', 'inactiva']),
            'type_id' => Type::all()->random()->id,
        ];
    }
}
